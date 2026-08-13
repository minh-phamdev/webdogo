<template>
    <a-layout-header class="header">
        <div class="nav-left">
            <a-menu v-model:selectedKeys="selectedKeys" mode="horizontal" class="menu">
                <a-menu-item key="home" @click="go('/')">Trang chủ</a-menu-item>
                <a-menu-item key="products" @click="go('/product-list')">Sản phẩm</a-menu-item>
                <a-menu-item key="shop" @click="go('/about')">Shop</a-menu-item>
                <a-menu-item key="contact" @click="go('/contact')">Liên hệ</a-menu-item>
                <a-menu-item key="blog" @click="go('/blog')">Blog</a-menu-item>
            </a-menu>
        </div>

        <div class="logo" @click="go('/')">
            <img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcSZGMIf6yDMGr62YRgRUEZU6ja2qGl1iLL_f47k14OHuQ&s=10"
                alt="logo" />
        </div>

        <div class="nav-right">
            <a-menu mode="horizontal" class="menu right">
                <a-menu-item key="login" @click="go('/login')">
                    Đăng nhập
                </a-menu-item>

                <a-menu-item key="cart" @click="go('/cart')">
                    <a-badge :count="cartCount" :show-zero="true" size="small">
                        <ShoppingCartOutlined />
                    </a-badge>
                    Giỏ hàng
                </a-menu-item>
            </a-menu>
        </div>
    </a-layout-header>
</template>

<script setup>
import { ref, watch } from 'vue'
import { useRouter, useRoute } from 'vue-router'
import { ShoppingCartOutlined } from '@ant-design/icons-vue'

const router = useRouter()
const route = useRoute()

const selectedKeys = ref(['home'])
const cartCount = ref(2)

const routeMap = {
    '/': 'home',
    '/products': 'product-list',
    '/shop': 'shop',
    '/contact': 'contact',
    '/blog': 'blog'
}

watch(
    () => route.path,
    (path) => {
        selectedKeys.value = [routeMap[path] || 'home']
    },
    { immediate: true }
)

const go = (path) => {
    if (!path || route.path === path) return
    router.push(path).catch(() => { })
}
</script>

<style scoped>
.header {
    position: sticky;
    top: 0;
    z-index: 1000;

    display: flex;
    align-items: center;
    justify-content: space-between;

    background: var(--wd-surface);
    padding: 0 60px;
    height: 76px;

    /* viền dưới có sắc vàng nhẹ thay vì xám lạnh #f0f0f0 - tạo cảm giác "được chăm chút" */
    border-bottom: 1px solid var(--wd-line);
    box-shadow: 0 1px 0 rgba(184, 134, 11, .05);
    font-family: var(--font-body);
}

.nav-left,
.nav-right {
    display: flex;
    align-items: center;
    min-width: 0;
}

.menu {
    border-bottom: none !important;
    background: transparent;
}

:deep(.ant-menu-item) {
    font-size: 15px;
    font-weight: 500;
    padding: 0 16px !important;
    color: var(--wd-ink);
    letter-spacing: .1px;
    transition: color .25s ease;
}

:deep(.ant-menu-item)::after {
    /* underline động thay cho border mặc định antd -> đỡ "khô" */
    border-bottom: 2px solid var(--wd-gold-600) !important;
}

:deep(.ant-menu-item:hover) {
    color: var(--wd-wood-700) !important;
}

:deep(.ant-menu-item-selected) {
    color: var(--wd-accent) !important;
    font-weight: 600;
}

.logo {
    position: absolute;
    left: 50%;
    transform: translateX(-50%);
    cursor: pointer;
}

.logo img {
    height: 48px;
    object-fit: contain;
    /* đổ bóng ấm rất nhẹ dưới logo để nó "nổi" trên nền kem thay vì dính phẳng */
    filter: drop-shadow(0 2px 4px rgba(92, 58, 33, .12));
    transition: transform .25s ease;
}

.logo img:hover {
    transform: scale(1.05);
}

.right :deep(.ant-menu-item) {
    font-size: 14px;
}

:deep(svg) {
    font-size: 19px;
    margin-right: 6px;
    color: var(--wd-wood-700);
}

/* nút giỏ hàng có viền nhẹ để trở thành điểm nhấn hành động, không lẫn vào menu chữ */
.right :deep(.ant-menu-item:last-child) {
    border: 1px solid var(--wd-line);
    border-radius: 999px;
    padding: 6px 16px !important;
    margin-left: 8px;
}

.right :deep(.ant-menu-item:last-child):hover {
    border-color: var(--wd-gold-600);
    background: #FDF8EE;
}
</style>