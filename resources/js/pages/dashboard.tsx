import { PlaceholderPattern } from '@/components/ui/placeholder-pattern';
import { Button } from '@/components/ui/button';
import { Card, CardContent, CardHeader, CardTitle } from '@/components/ui/card';
import AppLayout from '@/layouts/app-layout';
import { type BreadcrumbItem } from '@/types';
import { Head, Link } from '@inertiajs/react';
import { CheckSquare, Plus } from 'lucide-react';

const breadcrumbs: BreadcrumbItem[] = [
    {
        title: 'ダッシュボード',
        href: '/dashboard',
    },
];

export default function Dashboard() {
    return (
        <AppLayout breadcrumbs={breadcrumbs}>
            <Head title="ダッシュボード" />
            <div className="flex h-full flex-1 flex-col gap-6 rounded-xl p-6 overflow-x-auto">
                <div className="mb-6">
                    <h1 className="text-3xl font-bold text-gray-900 mb-2">ダッシュボード</h1>
                    <p className="text-gray-600">Todo Appにようこそ！タスクを効率的に管理しましょう。</p>
                </div>

                <div className="grid gap-6 md:grid-cols-2 lg:grid-cols-3">
                    {/* Todoリストカード */}
                    <Card className="hover:shadow-lg transition-shadow duration-200">
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-lg font-medium">
                                Todoリスト
                            </CardTitle>
                            <CheckSquare className="h-6 w-6 text-blue-600" />
                        </CardHeader>
                        <CardContent>
                            <div className="text-sm text-gray-600 mb-4">
                                タスクを作成・管理して、生産性を向上させましょう
                            </div>
                            <Link href="/todos">
                                <Button className="w-full">
                                    <Plus className="h-4 w-4 mr-2" />
                                    Todoを管理
                                </Button>
                            </Link>
                        </CardContent>
                    </Card>

                    {/* 統計カード */}
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-lg font-medium">
                                今日のタスク
                            </CardTitle>
                            <div className="h-6 w-6 rounded-full bg-green-100 flex items-center justify-center">
                                <span className="text-xs font-medium text-green-600">0</span>
                            </div>
                        </CardHeader>
                        <CardContent>
                            <div className="text-sm text-gray-600">
                                今日完了予定のタスクはありません
                            </div>
                        </CardContent>
                    </Card>

                    {/* 進捗カード */}
                    <Card>
                        <CardHeader className="flex flex-row items-center justify-between space-y-0 pb-2">
                            <CardTitle className="text-lg font-medium">
                                全体の進捗
                            </CardTitle>
                            <div className="h-6 w-6 rounded-full bg-blue-100 flex items-center justify-center">
                                <span className="text-xs font-medium text-blue-600">%</span>
                            </div>
                        </CardHeader>
                        <CardContent>
                            <div className="text-sm text-gray-600">
                                Todoを作成して進捗を確認しましょう
                            </div>
                        </CardContent>
                    </Card>
                </div>

                {/* クイックアクション */}
                <div className="mt-8">
                    <h2 className="text-xl font-semibold text-gray-900 mb-4">クイックアクション</h2>
                    <div className="grid gap-4 md:grid-cols-2">
                        <Card className="p-4">
                            <div className="flex items-center space-x-4">
                                <div className="p-2 bg-blue-100 rounded-lg">
                                    <CheckSquare className="h-6 w-6 text-blue-600" />
                                </div>
                                <div className="flex-1">
                                    <h3 className="font-medium">新しいTodoを追加</h3>
                                    <p className="text-sm text-gray-600">今日やるべきことを追加しましょう</p>
                                </div>
                                <Link href="/todos">
                                    <Button variant="outline" size="sm">
                                        追加
                                    </Button>
                                </Link>
                            </div>
                        </Card>

                        <Card className="p-4">
                            <div className="flex items-center space-x-4">
                                <div className="p-2 bg-green-100 rounded-lg">
                                    <CheckSquare className="h-6 w-6 text-green-600" />
                                </div>
                                <div className="flex-1">
                                    <h3 className="font-medium">Todoを確認</h3>
                                    <p className="text-sm text-gray-600">既存のタスクを確認・編集しましょう</p>
                                </div>
                                <Link href="/todos">
                                    <Button variant="outline" size="sm">
                                        確認
                                    </Button>
                                </Link>
                            </div>
                        </Card>
                    </div>
                </div>
            </div>
        </AppLayout>
    );
}
