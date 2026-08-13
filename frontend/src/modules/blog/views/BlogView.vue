<template>
    <div class="blog-page">
        <AppHeader />
        <PageHeader title="Kiến Thức Đồ Gỗ & Phong Thủy" breadcrumb="Trang chủ / Blog kiến thức" />

        <main class="page-content">
            <div class="container-1320">

                <!-- Filter danh mục -->
                <BlogCategoryFilter :categories="categories" :activeCategory="selectedCat"
                    @select-category="selectedCat = $event" />

                <!-- Bài viết Nổi Bật -->
                <FeaturedPostCard :post="featuredPost" />

                <!-- Lưới bài viết thường -->
                <div class="posts-grid">
                    <PostCard v-for="item in filteredPosts" :key="item.id" :post="item" />
                </div>

            </div>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import { ref, computed } from 'vue'

import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

import BlogCategoryFilter from '../components/BlogCategoryFilter.vue'
import FeaturedPostCard from '../components/FeaturedPostCard.vue'
import PostCard from '../components/PostCard.vue'

const selectedCat = ref('all')

const categories = [
    { name: 'Tất cả bài viết', slug: 'all' },
    { name: 'Phong Thủy Đặt Tượng', slug: 'phong-thuy' },
    { name: 'Phân Biệt Loại Gỗ', slug: 'loai-go' },
    { name: 'Thước Lỗ Ban', slug: 'lo-ban' }
]

const featuredPost = ref({
    id: 101,
    title: 'Hướng Dẫn Chọn Tượng Di Lặc Hợp Mệnh Mang Lại Tài Lộc',
    excerpt: 'Tượng Di Lặc là biểu tượng của sự hỉ lạc và may mắn. Việc chọn đúng chất liệu gỗ và vị trí đặt tượng chuẩn phong thủy sẽ giúp kích hoạt tối đa năng lượng tài lộc...',
    date: '10/08/2026',
    categoryName: 'Phong Thủy Đặt Tượng',
    image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=800&auto=format&fit=crop&q=80'
})

const posts = ref([
    {
        id: 1,
        category: 'loai-go',
        categoryName: 'Phân Biệt Loại Gỗ',
        title: 'Cách Phân Biệt Gỗ Hương Gia Lai Và Gỗ Hương Nam Phi Chuẩn 100%',
        excerpt: 'Gỗ Hương Gia Lai có đường vân mau, mùi thơm nhẹ đặc trưng. Hướng dẫn chi tiết cách nhận biết qua sắc gỗ và đường vân...',
        date: '05/08/2026',
        image: 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=500&auto=format&fit=crop&q=80'
    },
    {
        id: 2,
        category: 'lo-ban',
        categoryName: 'Thước Lỗ Ban',
        title: 'Tra Kích Thước Lỗ Ban Đặt Tượng Chuẩn Cung Cát Tài Lộc',
        excerpt: 'Bảng tra cứu các cung đỏ đẹp như Tiến Bảo, Tài Vượng, Đăng Khoa khi chọn mua tượng gỗ phong thủy phòng khách...',
        date: '02/08/2026',
        image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&auto=format&fit=crop&q=80'
    },
    {
        id: 3,
        category: 'phong-thuy',
        categoryName: 'Phong Thủy Đặt Tượng',
        title: 'Bí Quyết Bảo Quản Tượng Gỗ Nguyên Khối Không Bị Nứt Nẻ Mùa Khô',
        excerpt: 'Thời tiết hanh khô dễ làm phôi gỗ nguyên khối bị co nứt. Mẹo nhỏ sử dụng tinh dầu và sáp ong giúp bảo vệ lớp sơn PU...',
        date: '28/07/2026',
        image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=500&auto=format&fit=crop&q=80'
    }
])

const filteredPosts = computed(() => {
    if (selectedCat.value === 'all') return posts.value
    return posts.value.filter(p => p.category === selectedCat.value)
})
</script>

<style scoped>
.blog-page {
    background: #faf8f5;
}

.container-1320 {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
}

.page-content {
    padding: 30px 0 60px;
}

.posts-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
}

@media (max-width: 850px) {
    .posts-grid {
        grid-template-columns: 1fr;
    }
}
</style>