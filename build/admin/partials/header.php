<?php include ('config/database.php'); ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Divine-Shop-Online</title>
    <link rel="stylesheet" href="../css/style.css">
</head>

<body class="min-h-screen bg-font-color">
    <header class="bg-project-bg top-0 z-10 text-white sticky">
        <section class=" max-w-8xl mx-auto p-4 flex justify-between items-center">
            <h1 class="text-3xl font-semibold"> <a href="#">
                    <span class="text-yellow-600">🎩 Divine-</span>Admin-page</h1></a>
            <button id="hamburger" class="text-3xl sm:block md:hidden cursor-pointer">
                &#9776;
            </button>
            <nav class="hidden md:block space-x-3 text-xl">
          <a href="index.php" class="text-font-color hover:text-font-color-hover font-sans font-medium">Dashboard</a>
          <a href="manage-admin.php" class="text-font-color hover:text-font-color-hover sans font-medium">Admin</a>
          <a href="manage-products.php" class="text-font-color hover:text-font-color-hover font-sans font-medium">Products</a>
          <a href="#place" class="text-font-color hover:text-font-color-hover font-sans font-medium">Category</a>
          <a href="#place" class="text-font-color hover:text-font-color-hover font-sans font-medium">Order</a>
          <a href="#place" class="text-font-color hover:text-font-color-hover font-sans font-medium">Contact Us </a>
        </nav>
        </section>
    </header>