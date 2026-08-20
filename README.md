# 🪵 Wood Statue E-commerce System

> Backend: Laravel (DDD + SOLID)
> Frontend: Vue 3 (Modular + Scalable Architecture)

---

# 📌 1. Tech Stack

## 🔹 Backend

- Laravel
- Laravel Sanctum (Authentication)
- Spatie Laravel Data (DTO)
- Spatie Permission (RBAC)
- Spatie Media Library (Upload ảnh)
- Spatie Query Builder (Filter API)
- Redis (Cache + Queue)
- MySQL / PostgreSQL

---

## 🔹 Frontend

- Vue 3 + Vite
- Vue Router
- Pinia (State Management)
- Axios (HTTP Client)
- VueUse (Composable utilities)
- Tailwind CSS
- Ant Design Vue (UI)

---

## 🔹 Dev Tools

- Docker (optional)
- ESLint + Prettier
- PHP CS Fixer

---

# 🏗 2. Project Structure

```
root/
├── backend/
├── frontend/
└── README.md
```

---

# ⚙️ 3. Backend Structure (DDD)

```
backend/
├── app/
│   ├── Modules/
│   │   ├── Product/
│   │   ├── Order/
│   │   ├── User/
│   │   ├── Auth/
│   │   ├── Inventory/
│   │   ├── Category/
│   │   └── Payment/
│   │
│   ├── Shared/
│   │   ├── Domain/
│   │   ├── Application/
│   │   ├── Infrastructure/
│   │   └── Exceptions/
│
├── routes/
│   └── api.php
├── database/
├── config/
```

---

## 📦 Module Structure (Example: Product)

```
app/
├── Modules/
│   ├── User/
│   │   ├── Domain/
│   │   │   ├── Entities/
│   │   │   │   └── User.php
│   │   │   │
│   │   │   ├── ValueObjects/
│   │   │   │   └── Email.php
│   │   │   │
│   │   │   ├── Repositories/
│   │   │   │   └── UserRepositoryInterface.php      ✅ interface
│   │   │   │
│   │   │   ├── Services/
│   │   │   │   ├── UserDomainService.php
│   │   │   │   └── PasswordHasherInterface.php      ✅ interface (external)
│   │   │   │
│   │   │   └── Exceptions/
│   │   │       └── UserException.php
│   │   │
│   │   ├── Application/
│   │   │   ├── DTOs/
│   │   │   │   └── CreateUserDTO.php
│   │   │   │
│   │   │   ├── UseCases/
│   │   │   │   ├── CreateUserUseCase.php
│   │   │   │   └── GetUserUseCase.php
│   │   │   │
│   │   │   └── Services/
│   │   │       └── UserAppService.php (optional)
│   │   │
│   │   ├── Infrastructure/
│   │   │   ├── Persistence/
│   │   │   │   ├── Models/
│   │   │   │   │   └── UserModel.php
│   │   │   │   │
│   │   │   │   ├── Repositories/
│   │   │   │   │   └── UserRepository.php           ✅ implements interface
│   │   │   │   │
│   │   │   │   └── Mappers/
│   │   │   │       └── UserMapper.php
│   │   │   │
│   │   │   ├── Services/
│   │   │   │   └── BcryptPasswordHasher.php        ✅ implements interface
│   │   │   │
│   │   │   ├── Http/
│   │   │   │   ├── Controllers/
│   │   │   │   │   └── UserController.php
│   │   │   │   │
│   │   │   │   ├── Requests/
│   │   │   │   │   └── CreateUserRequest.php
│   │   │   │   │
│   │   │   │   └── Resources/
│   │   │   │       └── UserResource.php
│   │   │   │
│   │   │   └── Providers/
│   │   │       └── UserServiceProvider.php         ✅ bind interface
│   │   │
│   │   ├── Swagger/
│   │   │   ├── Schemas/
│   │   │   │   └── UserSchema.php
│   │   │   ├── Requests/
│   │   │   │   └── CreateUserRequestSchema.php
│   │   │   └── Responses/
│   │   │       └── UserResponse.php
│   │   │
│   │   └── Routes/
│   │       └── api.php
│   │
│   ├── Order/
│   │   └── (same structure as User)
│   │
│   └── Crawl/   👈 module riêng cho crawler (khuyến nghị)
│       ├── Domain/
│       │   ├── Entities/
│       │   ├── Repositories/
│       │   │   └── CrawlRepositoryInterface.php
│       │   └── Services/
│       │
│       ├── Application/
│       │   ├── DTOs/
│       │   └── UseCases/
│       │       └── CrawlProductUseCase.php
│       │
│       ├── Infrastructure/
│       │   ├── Crawlers/
│       │   │   ├── BaseCrawler.php
│       │   │   └── PhuongLinhCrawler.php
│       │   │
│       │   ├── Parsers/
│       │   │   └── ProductParser.php
│       │   │
│       │   ├── Persistence/
│       │   │   └── Repositories/
│       │   │       └── CrawlRepository.php
│       │   │
│       │   └── Queue/
│       │       └── CrawlJob.php
│       │
│       └── Swagger/
│
├── Swagger/
│   ├── OpenApi.php
│   ├── Schemas/
│   │   ├── ApiResponse.php
│   │   └── ApiError.php
│   └── Responses/
│       └── CommonResponses.php
│
├── Shared/
│   ├── Domain/
│   │   ├── ValueObjects/
│   │   ├── Exceptions/
│   │   └── Contracts/                ✅ interface dùng chung
│   │
│   ├── Application/
│   │   └── DTOs/
│   │
│   └── Infrastructure/
│       └── Helpers/
│
├── Providers/
│   └── AppServiceProvider.php
---
✅ Interface nằm ở:
Domain/
✅ Implementation nằm ở:
Infrastructure/
✅ Binding nằm ở:
Providers/

## 🔁 Backend Flow (DDD)

```

Controller
↓
UseCase
↓
Domain
↓
Repository Interface
↓
Repository Implementation
↓
DB

```

---

# 🎨 4. Frontend Structure (Vue Modular)

```

frontend/
├── src/
│ ├── modules/
│ │ ├── product/
│ │ ├── order/
│ │ ├── auth/
│ │ └── user/
│
│ ├── shared/
│ │ ├── components/
│ │ ├── utils/
│ │ └── constants/
│
│ ├── layouts/
│ │ ├── MainLayout.vue
│ │ ├── AuthLayout.vue
│ │ └── AdminLayout.vue
│
│ ├── router/
│ ├── store/
│ ├── services/
│ └── assets/

```

---

## 📦 Product Module (FE)

```

product/
├── api/
│ └── product.api.js
├── store/
│ └── product.store.js
├── views/
│ ├── ProductList.vue
│ ├── ProductDetail.vue
│ └── ProductCreate.vue
├── components/
│ ├── ProductCard.vue
│ ├── ProductForm.vue
│ └── ProductFilter.vue
└── composables/
└── useProduct.js

````

---

# 🔗 5. FE ↔ BE Mapping

| Backend    | Frontend           |
| ---------- | ------------------ |
| Controller | api.js             |
| DTO        | model              |
| UseCase    | composable/service |
| Domain     | business logic     |
| Repository | API call           |

---

# 🔐 6. Authentication Flow

- Laravel Sanctum (cookie-based)
- Vue gọi API qua Axios
- Middleware bảo vệ route backend
- Pinia lưu state user

---

# ⚡ 7. Performance & Best Practices

## Backend

- Cache Redis (product list)
- Queue xử lý async (order, email)
- Index DB

## Frontend

- Lazy load routes
- Code splitting
- Debounce search

---

# 🚨 8. Coding Rules (SOLID + DDD)

### ❌ Không được:

- Controller gọi trực tiếp Model
- Logic nằm trong Controller
- FE xử lý business logic

### ✅ Phải:

- Dùng DTO
- Tách Domain rõ ràng
- Dependency Injection

---

# 🚀 9. Run Project

## Backend

```bash
cd backend
composer install
php artisan migrate
php artisan serve
````

## Frontend

```bash
cd frontend
npm install
npm run dev
```

---

# 📌 10. Future Improvements

- CQRS (Command / Query separation)
- Event-driven architecture
- Microservices (nếu scale lớn)
- ElasticSearch (search sản phẩm)

---

# 🎯 11. Summary

- Clean Architecture + DDD
- Scalable (startup → enterprise)
- Maintainable
- Production-ready
