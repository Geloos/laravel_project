<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <style>
        /* Basic reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }
        
        body {
            background-color: #f5f5f5;
        }
        
        /* Navigation */
        nav {
            background-color: #333;
            color: white;
            padding: 1rem;
        }
        
        nav ul {
            display: flex;
            list-style: none;
        }
        
        nav li {
            margin-right: 1rem;
        }
        
        nav a {
            color: white;
            text-decoration: none;
            padding: 0.5rem;
            border-radius: 4px;
        }
        
        nav a:hover {
            background-color: #555;
        }
        
        nav a.active {
            background-color: #4CAF50;
        }
        
        /* Main content */
        .container {
            padding: 2rem;
            max-width: 1200px;
            margin: 0 auto;
        }
        
        .dashboard {
            background-color: white;
            padding: 2rem;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);
        }
        
        h1 {
            margin-bottom: 1rem;
        }
        
        p {
            color: #666;
            line-height: 1.6;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <li><a href="/home" class="{{ request()->is('/') ? 'active' : '' }}">Home</a></li>
            <li><a href="/transactions" class="{{ request()->is('transactions') ? 'active' : '' }}">Transactions</a></li>
        </ul>
    </nav>
    
    <div class="container">
        @yield('content') 
    </div>
</body>
</html>