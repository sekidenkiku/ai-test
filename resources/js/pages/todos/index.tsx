import React, { useState } from 'react';
import { Head, useForm, usePage } from '@inertiajs/react';
import { AppShell } from '@/components/app-shell';
import { Button } from '@/components/ui/button';
import { Input } from '@/components/ui/input';
import { Textarea } from '@/components/ui/textarea';
import { Checkbox } from '@/components/ui/checkbox';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import { Badge } from '@/components/ui/badge';
import { Plus, Edit, Trash2, Check, X } from 'lucide-react';

interface Todo {
    id: number;
    title: string;
    description: string | null;
    is_completed: boolean;
    created_at: string;
    updated_at: string;
}

interface Props {
    todos: Todo[];
}

export default function TodoIndex({ todos }: Props) {
    const [editingTodo, setEditingTodo] = useState<Todo | null>(null);
    
    const { data: createData, setData: setCreateData, post, processing: createProcessing, errors: createErrors, reset } = useForm({
        title: '',
        description: '',
    });

    const { data: editData, setData: setEditData, put, processing: editProcessing, errors: editErrors } = useForm({
        title: '',
        description: '',
        is_completed: false,
    });

    const { delete: deleteRequest, processing: deleteProcessing } = useForm();

    const handleCreate = (e: React.FormEvent) => {
        e.preventDefault();
        post(route('todos.store'), {
            onSuccess: () => {
                reset();
            },
        });
    };

    const handleEdit = (todo: Todo) => {
        setEditingTodo(todo);
        setEditData({
            title: todo.title,
            description: todo.description || '',
            is_completed: todo.is_completed,
        });
    };

    const handleUpdate = (e: React.FormEvent) => {
        e.preventDefault();
        if (editingTodo) {
            put(route('todos.update', editingTodo.id), {
                onSuccess: () => {
                    setEditingTodo(null);
                },
            });
        }
    };

    const handleToggleComplete = (todo: Todo) => {
        put(route('todos.update', todo.id), {
            data: {
                title: todo.title,
                description: todo.description,
                is_completed: !todo.is_completed,
            },
        });
    };

    const handleDelete = (todo: Todo) => {
        if (confirm('このTodoを削除してもよろしいですか？')) {
            deleteRequest(route('todos.destroy', todo.id));
        }
    };

    const cancelEdit = () => {
        setEditingTodo(null);
    };

    return (
        <AppShell>
            <Head title="Todoリスト" />
            
            <div className="max-w-4xl mx-auto p-6">
                <div className="mb-8">
                    <h1 className="text-3xl font-bold text-gray-900 mb-2">Todoリスト</h1>
                    <p className="text-gray-600">あなたのタスクを管理しましょう</p>
                </div>

                {/* 新規作成フォーム */}
                <Card className="mb-8">
                    <CardHeader>
                        <CardTitle className="flex items-center gap-2">
                            <Plus className="h-5 w-5" />
                            新しいTodoを追加
                        </CardTitle>
                    </CardHeader>
                    <CardContent>
                        <form onSubmit={handleCreate} className="space-y-4">
                            <div>
                                <Input
                                    type="text"
                                    placeholder="タスクのタイトルを入力してください"
                                    value={createData.title}
                                    onChange={(e) => setCreateData('title', e.target.value)}
                                    className="w-full"
                                />
                                {createErrors.title && (
                                    <p className="text-red-500 text-sm mt-1">{createErrors.title}</p>
                                )}
                            </div>
                            <div>
                                <Textarea
                                    placeholder="詳細な説明を入力してください（任意）"
                                    value={createData.description}
                                    onChange={(e) => setCreateData('description', e.target.value)}
                                    className="w-full"
                                    rows={3}
                                />
                                {createErrors.description && (
                                    <p className="text-red-500 text-sm mt-1">{createErrors.description}</p>
                                )}
                            </div>
                            <Button 
                                type="submit" 
                                disabled={createProcessing}
                                className="w-full sm:w-auto"
                            >
                                {createProcessing ? '追加中...' : 'Todoを追加'}
                            </Button>
                        </form>
                    </CardContent>
                </Card>

                {/* Todoリスト */}
                <div className="space-y-4">
                    {todos.length === 0 ? (
                        <Card>
                            <CardContent className="text-center py-12">
                                <p className="text-gray-500 text-lg">まだTodoがありません</p>
                                <p className="text-gray-400">上のフォームから最初のTodoを追加しましょう</p>
                            </CardContent>
                        </Card>
                    ) : (
                        todos.map((todo) => (
                            <Card key={todo.id} className={`transition-all duration-200 ${todo.is_completed ? 'opacity-75' : ''}`}>
                                <CardContent className="p-6">
                                    {editingTodo?.id === todo.id ? (
                                        /* 編集フォーム */
                                        <form onSubmit={handleUpdate} className="space-y-4">
                                            <div>
                                                <Input
                                                    type="text"
                                                    value={editData.title}
                                                    onChange={(e) => setEditData('title', e.target.value)}
                                                    className="w-full"
                                                />
                                                {editErrors.title && (
                                                    <p className="text-red-500 text-sm mt-1">{editErrors.title}</p>
                                                )}
                                            </div>
                                            <div>
                                                <Textarea
                                                    value={editData.description}
                                                    onChange={(e) => setEditData('description', e.target.value)}
                                                    className="w-full"
                                                    rows={3}
                                                />
                                                {editErrors.description && (
                                                    <p className="text-red-500 text-sm mt-1">{editErrors.description}</p>
                                                )}
                                            </div>
                                            <div className="flex items-center space-x-2">
                                                <Checkbox
                                                    id={`completed-${todo.id}`}
                                                    checked={editData.is_completed}
                                                    onCheckedChange={(checked) => setEditData('is_completed', checked as boolean)}
                                                />
                                                <label htmlFor={`completed-${todo.id}`} className="text-sm">
                                                    完了済み
                                                </label>
                                            </div>
                                            <div className="flex gap-2">
                                                <Button 
                                                    type="submit" 
                                                    disabled={editProcessing}
                                                    size="sm"
                                                >
                                                    <Check className="h-4 w-4 mr-1" />
                                                    {editProcessing ? '保存中...' : '保存'}
                                                </Button>
                                                <Button 
                                                    type="button" 
                                                    variant="outline"
                                                    onClick={cancelEdit}
                                                    size="sm"
                                                >
                                                    <X className="h-4 w-4 mr-1" />
                                                    キャンセル
                                                </Button>
                                            </div>
                                        </form>
                                    ) : (
                                        /* 表示モード */
                                        <div className="space-y-3">
                                            <div className="flex items-start justify-between">
                                                <div className="flex items-start space-x-3 flex-1">
                                                    <Checkbox
                                                        checked={todo.is_completed}
                                                        onCheckedChange={() => handleToggleComplete(todo)}
                                                        className="mt-1"
                                                    />
                                                    <div className="flex-1">
                                                        <h3 className={`font-semibold text-lg ${todo.is_completed ? 'line-through text-gray-500' : 'text-gray-900'}`}>
                                                            {todo.title}
                                                        </h3>
                                                        {todo.description && (
                                                            <p className={`mt-1 ${todo.is_completed ? 'line-through text-gray-400' : 'text-gray-600'}`}>
                                                                {todo.description}
                                                            </p>
                                                        )}
                                                        <div className="flex items-center gap-2 mt-2">
                                                            <Badge variant={todo.is_completed ? "secondary" : "default"}>
                                                                {todo.is_completed ? '完了' : '未完了'}
                                                            </Badge>
                                                            <span className="text-xs text-gray-400">
                                                                作成日: {new Date(todo.created_at).toLocaleDateString('ja-JP')}
                                                            </span>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div className="flex space-x-2 ml-4">
                                                    <Button
                                                        variant="outline"
                                                        size="sm"
                                                        onClick={() => handleEdit(todo)}
                                                        className="flex-shrink-0"
                                                    >
                                                        <Edit className="h-4 w-4" />
                                                    </Button>
                                                    <Button
                                                        variant="outline"
                                                        size="sm"
                                                        onClick={() => handleDelete(todo)}
                                                        disabled={deleteProcessing}
                                                        className="flex-shrink-0 text-red-600 hover:text-red-700"
                                                    >
                                                        <Trash2 className="h-4 w-4" />
                                                    </Button>
                                                </div>
                                            </div>
                                        </div>
                                    )}
                                </CardContent>
                            </Card>
                        ))
                    )}
                </div>
            </div>
        </AppShell>
    );
}