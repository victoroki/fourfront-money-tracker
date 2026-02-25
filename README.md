# FourFront Admin Dashboard

A modern, professional admin dashboard built with Laravel and Tailwind CSS. This application provides a clean, responsive interface for managing users, wallets, and transactions with an intuitive admin panel.

## 🚀 Features

### Modern UI/UX
- **Responsive Design**: Works seamlessly across desktop, tablet, and mobile devices
- **Collapsible Sidebar**: Clean navigation with smooth transitions
- **Modern Dashboard**: Statistics cards with icons and visual indicators
- **Professional Styling**: Consistent design system with Tailwind CSS
- **Interactive Components**: Alpine.js powered dropdowns and navigation

### Core Functionality
- **User Management**: Create, edit, delete, and view users (admin only)
- **Wallet Management**: Manage financial wallets with balance tracking
- **Transaction Management**: Record and track income/expense transactions
- **Profile Management**: Update user profile information and password
- **Role-based Access**: Admin and user role permissions

### Technical Features
- **Mobile-First Design**: Optimized for all screen sizes
- **Smooth Animations**: CSS transitions for better user experience
- **Clean Code Structure**: Well-organized Blade components and layouts
- **Modern Tooling**: Vite for asset bundling, Alpine.js for interactivity

## 📋 Prerequisites

- PHP 8.1 or higher
- Composer
- Node.js 16+ and npm
- SQLite (configured by default) or MySQL/PostgreSQL

## 🛠️ Installation

1. **Clone the repository**
```bash
git clone <repository-url>
cd fourfront
```

2. **Install PHP dependencies**
```bash
composer install
```

3. **Install Node dependencies**
```bash
npm install
```

4. **Environment Setup**
```bash
cp .env.example .env
php artisan key:generate
```

5. **Database Setup**
```bash
php artisan migrate --seed
```

6. **Build Assets**
```bash
npm run dev
```

7. **Start Development Servers**
```bash
# Terminal 1: Laravel server
php artisan serve

# Terminal 2: Vite development server
npm run dev
```

## 🎯 Usage

### Default Credentials
- **Admin User**: admin@example.com / password
- **Regular User**: user@example.com / password

### Key Pages
- **Dashboard**: Overview of statistics and recent activity
- **Users**: Manage user accounts (admin only)
- **Wallets**: Create and manage financial wallets
- **Transactions**: Record and view financial transactions
- **Profile**: Update personal information and password

## 📁 Project Structure

```
app/
├── Http/
│   ├── Controllers/
│   │   ├── Auth/           # Authentication controllers
│   │   ├── Web/            # Main application controllers
│   │   └── DashboardController.php
│   └── Middleware/
│       └── CheckRole.php   # Role-based access control
├── Models/
│   ├── User.php
│   ├── Wallet.php
│   ├── Transaction.php
│   └── Role.php
└── View/Components/
    ├── AppLayout.php
    └── GuestLayout.php

resources/
├── views/
│   ├── layouts/
│   │   ├── admin.blade.php          # Main admin layout
│   │   ├── app.blade.php            # Auth layout
│   │   └── partials/
│   │       ├── sidebar.blade.php    # Desktop sidebar
│   │       ├── header.blade.php     # Top navigation
│   │       └── mobile-sidebar.blade.php
│   ├── dashboard.blade.php          # Dashboard page
│   ├── users/                       # Users management pages
│   ├── wallets/                     # Wallets management pages
│   ├── transactions/                # Transactions management pages
│   └── profile/                     # Profile management pages
├── css/
│   └── app.css                      # Tailwind CSS
└── js/
    └── app.js                       # Alpine.js initialization

database/
├── migrations/                      # Database schema
└── seeders/                         # Sample data
```

## 🎨 Design System

### Color Palette
- **Primary**: Indigo (#3b82f6)
- **Secondary**: Gray (#64748b)
- **Success**: Green (#22c55e)
- **Warning**: Amber (#f59e0b)
- **Danger**: Red (#ef4444)

### Typography
- **Font**: Figtree (Google Fonts)
- **Scale**: Consistent sizing from xs to 2xl
- **Weights**: 400 (regular), 500 (medium), 600 (semibold)

### Spacing
- **Consistent padding/margin**: 4px increments
- **Card spacing**: 16px (p-4) standard
- **Component gaps**: 16px (gap-4) standard

## 📱 Responsive Breakpoints

- **Mobile**: < 640px (sm)
- **Tablet**: 640px - 1024px (sm to lg)
- **Desktop**: > 1024px (lg+)

## 🔧 Customization

### Adding New Pages
1. Create a new Blade file in the appropriate directory
2. Extend the admin layout: `@extends('layouts.admin')`
3. Set the page title: `<x-slot name="pageTitle">Page Name</x-slot>`
4. Add your content in the main slot

### Modifying the Sidebar
Edit `resources/views/layouts/partials/sidebar.blade.php` to:
- Add new navigation items
- Modify icons and labels
- Adjust active state logic

### Updating the Design System
Modify `tailwind.config.js` to:
- Change color palette
- Add custom components
- Adjust spacing scales

## 🚀 Deployment

### Production Build
```bash
npm run build
php artisan config:cache
php artisan route:cache
php artisan view:cache
```

### Server Requirements
- PHP 8.1+
- MySQL 5.7+ or PostgreSQL 9.6+
- Apache or Nginx
- Composer
- Node.js (for asset building)

## 🤝 Contributing

1. Fork the repository
2. Create your feature branch (`git checkout -b feature/AmazingFeature`)
3. Commit your changes (`git commit -m 'Add some AmazingFeature'`)
4. Push to the branch (`git push origin feature/AmazingFeature`)
5. Open a Pull Request

## 📄 License

This project is licensed under the MIT License - see the [LICENSE](LICENSE) file for details.

## 🙏 Acknowledgments

- [Laravel](https://laravel.com/) - PHP Framework
- [Tailwind CSS](https://tailwindcss.com/) - Utility-first CSS framework
- [Alpine.js](https://alpinejs.dev/) - Lightweight JavaScript framework
- [Heroicons](https://heroicons.com/) - Beautiful SVG icons
- [Vite](https://vitejs.dev/) - Next generation frontend tooling

## 📞 Support

For support, email support@example.com or open an issue in the repository.

---

**Built with ❤️ using Laravel and modern web technologies**