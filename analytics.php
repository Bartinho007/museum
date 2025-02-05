<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_museum";

// Устанавливаем соединение с БД
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Получаем общее количество товаров
$goodsQuery = "SELECT COUNT(*) AS total_goods FROM tovari";
$goodsResult = $conn->query($goodsQuery);
$goodsData = $goodsResult->fetch_assoc();

// Получаем общее количество пользователей
$userQuery = "SELECT COUNT(*) AS total_users FROM users";
$userResult = $conn->query($userQuery);
$userData = $userResult->fetch_assoc();

// Получаем список экспозиций
$exhibitsQuery = "SELECT * FROM exhibits";
$exhibitsResult = $conn->query($exhibitsQuery);
$exhibitsCount = $exhibitsResult->num_rows;
?>

<!DOCTYPE html>
<html lang="ru">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Аналитика музея искусств</title>
  <link rel="stylesheet" href="assets/css/style.css">
  <link rel="icon" href="assets/img/logo_image.png" type="image/x-icon">
  <!-- Подключение Tailwind CSS -->
  <script src="https://cdn.tailwindcss.com"></script>
  <!-- Подключение Chart.js -->
  <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body class="bg-white-100">
<?php
    include "header.php";
    ?>
  <div class="container mx-auto p-4">
    <h1 class="text-3xl font-bold text-center mb-8 text-black">Аналитика музея искусств</h1>
    
    <!-- Блоки с общей информацией -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-8">
      <div class="bg-blue-500 text-white p-6 rounded shadow">
        <h2 class="text-xl">Товаров в базе</h2>
        <p class="text-4xl font-bold mt-2"><?php echo $goodsData['total_goods']; ?></p>
      </div>
      <div class="bg-green-500 text-white p-6 rounded shadow">
        <h2 class="text-xl">Пользователей</h2>
        <p class="text-4xl font-bold mt-2"><?php echo $userData['total_users']; ?></p>
      </div>
      <div class="bg-indigo-500 text-white p-6 rounded shadow">
        <h2 class="text-xl">Экспозиций</h2>
        <p class="text-4xl font-bold mt-2"><?php echo $exhibitsCount; ?></p>
      </div>
    </div>

    <!-- Диаграмма с использованием Chart.js -->
    <div class="bg-white p-6 rounded shadow mb-8">
      <h2 class="text-2xl font-semibold mb-4">Общая статистика</h2>
      <canvas id="myChart" width="400" height="200"></canvas>
    </div>

    <!-- Таблица с информацией об экспозициях -->
    <div class="bg-white p-6 rounded shadow">
      <h2 class="text-2xl font-semibold mb-4">Список экспозиций</h2>
      <div class="overflow-x-auto">
        <table class="min-w-full divide-y divide-gray-200">
          <thead class="bg-gray-800 text-white">
            <tr>
              <th class="px-4 py-2">ID</th>
              <th class="px-4 py-2">Название</th>
              <th class="px-4 py-2">Описание</th>
              <th class="px-4 py-2">Дата начала</th>
              <th class="px-4 py-2">Дата окончания</th>
            </tr>
          </thead>
          <tbody class="bg-white divide-y divide-gray-200">
            <?php if ($exhibitsResult->num_rows > 0): ?>
              <?php while ($row = $exhibitsResult->fetch_assoc()): ?>
                <tr>
                  <td class="px-4 py-2"><?php echo $row['id']; ?></td>
                  <td class="px-4 py-2"><?php echo $row['name']; ?></td>
                  <td class="px-4 py-2"><?php echo $row['description']; ?></td>
                  <td class="px-4 py-2"><?php echo $row['start_date']; ?></td>
                  <td class="px-4 py-2"><?php echo $row['end_date']; ?></td>
                </tr>
              <?php endwhile; ?>
            <?php else: ?>
              <tr>
                <td colspan="5" class="px-4 py-2 text-center">Нет данных для отображения</td>
              </tr>
            <?php endif; ?>
          </tbody>
        </table>
      </div>
    </div>
  </div>

  <?php $conn->close(); ?>

  <!-- Скрипт для построения диаграммы -->
  <script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
      type: 'bar', // Тип диаграммы
      data: {
        labels: ['Товары', 'Пользователи', 'Экспозиции'],
        datasets: [{
          label: 'Количество',
          data: [
            <?php echo $goodsData['total_goods']; ?>,
            <?php echo $userData['total_users']; ?>,
            <?php echo $exhibitsCount; ?>
          ],
          backgroundColor: [
            'rgba(59, 130, 246, 0.7)',
            'rgba(16, 185, 129, 0.7)',
            'rgba(99, 102, 241, 0.7)'
          ],
          borderColor: [
            'rgba(59, 130, 246, 1)',
            'rgba(16, 185, 129, 1)',
            'rgba(99, 102, 241, 1)'
          ],
          borderWidth: 1
        }]
      },
      options: {
        scales: {
          y: {
            beginAtZero: true,
            ticks: {
              precision: 0
            }
          }
        }
      }
    });
  </script>
</body>
</html>
