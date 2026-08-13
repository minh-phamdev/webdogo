import { createRouter, createWebHistory } from 'vue-router'

// 1. Màn hình trang chủ import trực tiếp (để hiển thị ngay lập tức)
import HomePage from '@/modules/home/views/HomePage.vue'

const routes = [
  // ==========================================
  // 🏠 1. TRANG CHỦ & BÁN HÀNG CƠ BẢN
  // ==========================================
  {
    path: '/',
    name: 'Home',
    component: HomePage,
    meta: { title: 'Trang chủ - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/login-admin',
    name: 'AdminLoginView',
    component: () => import('@/modules/auth/views/AdminLoginView.vue'),
    meta: { title: 'Admin' },
  },
  {
    path: '/product-list',
    name: 'ProductListView',
    component: () => import('@/modules/product_list/views/ProductListView.vue'),
    meta: { title: 'Danh sách sản phẩm - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/product/:id',
    name: 'ProductDetail',
    component: () => import('@/modules/product_detail/views/ProductDetail.vue'),
    meta: { title: 'Chi tiết sản phẩm - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/cart',
    name: 'CartView',
    component: () => import('@/modules/cart/views/CartView.vue'),
    meta: { title: 'Giỏ hàng - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/checkout',
    name: 'CheckoutView',
    component: () => import('@/modules/checkout/views/CheckoutView.vue'),
    meta: { title: 'Thanh toán đơn hàng - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/order-success',
    name: 'OrderSuccessView',
    component: () => import('@/modules/order/views/OrderSuccessView.vue'),
    meta: { title: 'Đặt hàng thành công - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/order-tracking',
    name: 'OrderTrackingView',
    component: () => import('@/modules/order/views/OrderTrackingView.vue'),
    meta: { title: 'Theo dõi đơn hàng - Đồ Gỗ Anh Khoa' },
  },

  // ==========================================
  // 🏢 2. THÔNG TIN THƯƠNG HIỆU & TIN TỨC
  // ==========================================
  {
    path: '/about',
    name: 'AboutView',
    component: () => import('@/modules/about/views/AboutView.vue'),
    meta: { title: 'Giới thiệu & Đội ngũ Nghệ nhân - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/contact',
    name: 'ContactView',
    component: () => import('@/modules/contact/views/ContactView.vue'),
    meta: { title: 'Liên hệ & Showroom - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/blog',
    name: 'BlogView',
    component: () => import('@/modules/blog/views/BlogView.vue'),
    meta: { title: 'Kiến thức Đồ Gỗ & Phong Thủy - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/blog/:id',
    name: 'BlogDetailView',
    component: () => import('@/modules/blog/views/BlogDetailView.vue'),
    meta: { title: 'Chi tiết bài viết - Đồ Gỗ Anh Khoa' },
  },

  // ==========================================
  // 📜 3. CHÍNH SÁCH PHÁP LÝ (POLICY)
  // ==========================================
  {
    path: '/chinh-sach-bao-hanh',
    name: 'WarrantyPolicy',
    component: () => import('@/modules/policy/views/WarrantyPolicyView.vue'),
    meta: { title: 'Chính sách bảo hành & bảo trì - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/chinh-sach-van-chuyen',
    name: 'ShippingPolicy',
    component: () => import('@/modules/policy/views/ShippingPolicyView.vue'),
    meta: { title: 'Chính sách vận chuyển & giao nhận - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/chinh-sach-doi-tra',
    name: 'ReturnPolicy',
    component: () => import('@/modules/policy/views/ReturnPolicyView.vue'),
    meta: { title: 'Chính sách đổi trả & hoàn tiền - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/dieu-khoan-su-dung',
    name: 'Terms',
    component: () => import('@/modules/policy/views/TermsView.vue'),
    meta: { title: 'Điều khoản sử dụng website - Đồ Gỗ Anh Khoa' },
  },

  // ==========================================
  // 🤝 4. HỖ TRỢ KHÁCH HÀNG (SUPPORT)
  // ==========================================
  {
    path: '/cau-hoi-thuong-gap',
    name: 'FAQ',
    component: () => import('@/modules/support/views/FAQView.vue'),
    meta: { title: 'Câu hỏi thường gặp (FAQ) - Đồ Gỗ Anh Khoa' },
  },
  {
    path: '/huong-dan-mua-hang',
    name: 'BuyingGuide',
    component: () => import('@/modules/support/views/BuyingGuideView.vue'),
    meta: { title: 'Hướng dẫn mua hàng & đặt cọc - Đồ Gỗ Anh Khoa' },
  },

  // ==========================================
  // 🚫 5. CATCH-ALL ROUTE (404 REDIRECT)
  // ==========================================
  {
    path: '/:pathMatch(.*)*',
    name: 'NotFound',
    redirect: '/',
  },
]

const router = createRouter({
  history: createWebHistory(import.meta.env.BASE_URL),
  routes,
  // Luôn cuộn lên đầu trang khi chuyển Route
  scrollBehavior(to, from, savedPosition) {
    if (savedPosition) {
      return savedPosition
    } else {
      return { top: 0, behavior: 'smooth' }
    }
  },
})

// Tự động cập nhật Title cho tab trình duyệt chuẩn SEO
router.afterEach((to) => {
  document.title = to.meta.title || 'Đồ Gỗ Anh Khoa - Nội Thất & Phong Thủy'
})

export default router
