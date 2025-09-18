<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Students List</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gradient-to-br from-blue-100 to-purple-100 min-h-screen flex">

    <!-- Sidebar -->
    <aside class="w-64 bg-white shadow-xl border-r border-gray-200 p-6 flex flex-col">
        <h2 class="text-2xl font-bold text-gray-800 mb-8">Admin Panel</h2>

        <nav class="flex flex-col gap-3">
            <a href="/students/dashboard" class="px-4 py-2 rounded-lg hover:bg-blue-100 transition font-medium text-gray-700">
                📊 Dashboard
            </a>
            <a href="/students/accounts" class="px-4 py-2 rounded-lg hover:bg-blue-100 transition font-medium text-gray-700">
                👤 Accounts
            </a>
            <a href="/students/settings" class="px-4 py-2 rounded-lg hover:bg-blue-100 transition font-medium text-gray-700">
                ⚙️ Settings
            </a>
        </nav>
    </aside>

    <!-- Main Content -->
    <main class="flex-1 p-8">
        <div class="max-w-4xl mx-auto bg-white shadow-xl rounded-2xl p-8 border border-gray-200">
            <h1 class="text-3xl font-extrabold mb-8 text-gray-800">Student Accounts</h1>

            <div class="flex gap-3 mb-4">
                <a href="/students/create" class="bg-green-600 text-white px-5 py-2 rounded-lg shadow hover:bg-green-700 transition">
                    + Add New Student
                </a>
                <a href="/students/delete_all"
                    onclick="return confirm('Are you sure you want to delete ALL records?')"
                    class="bg-red-700 text-white px-5 py-2 rounded-lg shadow hover:bg-red-800 transition">
                    Delete All
                </a>
            </div>

            <!-- Students Table -->
            <div class="overflow-x-auto mt-6">
                <table class="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
                    <thead>
                        <tr class="bg-gradient-to-r from-blue-200 to-purple-200 text-gray-700">
                            <th class="py-3 px-5 border-b font-semibold">ID</th>
                            <th class="py-3 px-5 border-b font-semibold">Last Name</th>
                            <th class="py-3 px-5 border-b font-semibold">First Name</th>
                            <th class="py-3 px-5 border-b font-semibold">Email</th>
                            <th class="py-3 px-5 border-b text-center font-semibold">Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if (!empty($students)): ?>
                            <?php foreach ($students as $student): ?>
                                <tr class="hover:bg-blue-50 transition">
                                    <td class="py-3 px-5 border-b"><?= $student['id'] ?></td>
                                    <td class="py-3 px-5 border-b"><?= $student['last_name'] ?></td>
                                    <td class="py-3 px-5 border-b"><?= $student['first_name'] ?></td>
                                    <td class="py-3 px-5 border-b"><?= $student['email'] ?></td>
                                    <td class="py-3 px-5 border-b text-center">
                                        <a href="/students/edit/<?= $student['id'] ?>" 
                                        class="bg-blue-600 text-white px-4 py-1 rounded-lg hover:bg-blue-700 transition shadow">
                                            Edit
                                        </a>
                                        <a href="/students/delete/<?= $student['id'] ?>" 
                                        onclick="return confirm('Are you sure you want to delete this student?')"
                                        class="bg-red-600 text-white px-4 py-1 rounded-lg hover:bg-red-700 transition shadow ml-2">
                                            Delete
                                        </a>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        <?php else: ?>
                            <tr>
                                <td colspan="5" class="text-center py-6 text-gray-500">No students found.</td>
                            </tr>
                        <?php endif; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </main>

</body>
</html>
