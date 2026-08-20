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
Product/                                # MODULE SẢN PHẨM (toàn bộ domain Product)

├── Domain/                             # TẦNG NGHIỆP VỤ CỐT LÕI (KHÔNG phụ thuộc Laravel)

│   ├── Entities/                       # Thực thể nghiệp vụ (Business Object)
│   │   ├── Product.php                # Sản phẩm - chứa trạng thái + hành vi chính
│   │   ├── ProductMedia.php           # Media sản phẩm (ảnh/video)
│   │
│   ├── ValueObjects/                  # Đối tượng giá trị (immutable - không ID)
│   │   ├── Money.php                  # Tiền tệ (giá, compare price)
│   │   ├── Slug.php                  # URL thân thiện
│   │   ├── Sku.php                   # Mã sản phẩm duy nhất
│   │   ├── Dimension.php             # Kích thước (cao, rộng, sâu)
│   │   ├── Weight.php                # Cân nặng
│   │   ├── Inventory.php             # Tồn kho + reserved
│   │   ├── ProductStatus.php         # Trạng thái sản phẩm
│   │
│   ├── Repositories/                  # CONTRACT (GIAO ƯỚC LƯU TRỮ DỮ LIỆU)
│   │   ├── ProductRepositoryInterface.php      # CRUD + persistence Product
│   │   ├── ProductMediaRepositoryInterface.php # CRUD media
│   │
│   ├── Services/                      # DOMAIN SERVICE (logic phức tạp nhiều entity)
│   │   ├── ProductServiceInterface.php  # ❗ chỉ dùng khi có business logic phức tạp (giảm/validate tồn kho,...)
│   │
│   ├── Exceptions/                    # Ngoại lệ nghiệp vụ
│       ├── ProductException.php       # Base exception cho Product domain


├── Application/                       # TẦNG USE CASE (điều phối nghiệp vụ)

│   ├── DTOs/                          # Data Transfer Object (dữ liệu vào UseCase)
│   │   ├── CreateProductDTO.php       # dữ liệu tạo sản phẩm
│   │   ├── UpdateProductDTO.php       # dữ liệu update sản phẩm
│   │   ├── CreateProductMediaDTO.php  # tạo media
│   │   ├── UpdateProductMediaDTO.php  # update media
│   │   ├── ProductFilterDTO.php       # filter list product
│   │
│   ├── UseCases/                      # BUSINESS FLOW (luồng xử lý nghiệp vụ)
│   │   ├── Product/
│   │   │   ├── CreateProductUseCase.php   # tạo sản phẩm
│   │   │   ├── UpdateProductUseCase.php   # cập nhật sản phẩm
│   │   │   ├── DeleteProductUseCase.php   # xóa sản phẩm
│   │   │   ├── GetProductUseCase.php      # lấy chi tiết sản phẩm
│   │   │   ├── ListProductsUseCase.php    # danh sách sản phẩm
│   │   │
│   │   ├── ProductMedia/
│   │       ├── CreateProductMediaUseCase.php  # upload media
│   │       ├── UpdateProductMediaUseCase.php  # update media
│   │       ├── DeleteProductMediaUseCase.php  # xóa media
│   │       ├── GetProductMediaUseCase.php     # lấy media
│   │       ├── ListProductMediaUseCase.php    # danh sách media
│   │
│   ├── Queries/                       # READ MODEL (tối ưu truy vấn)
│       ├── ProductQueryService.php    # xử lý filter + paginate + search


├── Infrastructure/                   # TẦNG KỸ THUẬT (Laravel, DB, external)

│   ├── Persistence/
│   │   ├── Models/                   # Eloquent ORM (DB layer)
│   │   │   ├── Product.php           # model bảng products
│   │   │   ├── ProductMedia.php      # model media
│   │   │
│   │   ├── Repositories/             # IMPLEMENTATION của Domain Repository
│   │   │   ├── ProductRepository.php
│   │   │   ├── ProductMediaRepository.php
│   │   │
│   │   ├── Mappers/                  # mapping giữa DB ↔ Domain
│   │       ├── ProductMapper.php      # convert Model ↔ Entity + VO
│   │
│   ├── Providers/
│   │   ├── ProductServiceProvider.php # bind interface → implementation
│   │
│   ├── Services/                      # SERVICE kỹ thuật (KHÔNG phải business)
│       ├── ProductService.php        # ❗ chỉ dùng nếu gọi API ngoài / xử lý file / cache


├── Interfaces/                       # TẦNG GIAO TIẾP (API / HTTP layer)

│   ├── Http/
│   │   ├── Controllers/             # CONTROLLER (entry point API)
│   │   │   ├── ProductController.php
│   │   │   ├── ProductMediaController.php
│   │   │
│   │   ├── Requests/                # VALIDATION input (FormRequest)
│   │   │   ├── StoreProductRequest.php
│   │   │   ├── UpdateProductRequest.php
│   │   │   ├── StoreProductMediaRequest.php
│   │   │   ├── UpdateProductMediaRequest.php
│   │   │
│   │   ├── Resources/               # FORMAT OUTPUT API (JSON response)
│   │       ├── ProductResource.php   # format product response
│   │       ├── ProductMediaResource.php # format media response


├── Routes/                          # ROUTE MODULE
│   ├── api.php                      # khai báo route Product module


├── Swagger/                         # DOCUMENT API
│   ├── Requests/                    # schema request swagger
│   ├── Responses/                   # schema response swagger
│   ├── Schemas/                     # model schema API docs
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
