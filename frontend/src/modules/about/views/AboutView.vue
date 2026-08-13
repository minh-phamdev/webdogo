<template>
    <div class="about-page">
        <AppHeader />
        <PageHeader title="Hành Trình Gửi Trọn Tâm Huyết Vào Gỗ Quý" breadcrumb="Trang chủ / Giới thiệu" />

        <main class="page-content">
            <!-- 1. Brand Story Component -->
            <BrandStory />

            <!-- 2. Section Nghệ nhân -->
            <section class="artisans-section">
                <div class="container-1320">
                    <div class="text-center section-head">
                        <span class="sub-title">BÀN TAY VÀNG</span>
                        <h2 class="serif section-title">Đội Ngũ Nghệ Nhân Chế Tác</h2>
                        <div class="gold-divider"></div>
                    </div>

                    <div class="artisans-grid">
                        <ArtisanCard v-for="item in artisans" :key="item.id" :artisan="item" />
                    </div>
                </div>
            </section>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import { ref } from 'vue'
import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

import BrandStory from '../components/BrandStory.vue'
import ArtisanCard from '../components/ArtisanCard.vue'

const artisans = ref([
    {
        id: 1,
        name: 'Nghệ nhân Nguyễn Văn Tâm',
        experience: 30,
        specialty: 'Tượng Phật & Tượng Di Lặc',
        bio: 'Người thổi hồn vào từng nụ cười hỉ lạc của Tượng Di Lặc với kỹ thuật tạo nét diện tinh xảo.',
        avatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=400&auto=format&fit=crop&q=80'
    },
    {
        id: 2,
        name: 'Nghệ nhân Trần Đình Long',
        experience: 22,
        specialty: 'Linh Vật & Quan Công',
        bio: 'Bậc thầy về đường đục dáng rồng, nghê và diện tượng Quan Công uy nghiêm, thần thái.',
        avatar: 'https://images.unsplash.com/photo-1500648767791-00dcc994a43e?w=400&auto=format&fit=crop&q=80'
    },
    {
        id: 3,
        name: 'Nghệ nhân Lê Khắc Tuấn',
        experience: 18,
        specialty: 'Lục Bình & Nu Gỗ Nguyên Khối',
        bio: 'Chuyên gia chọn phôi gỗ nu hiếm và đục tỉa chi tiết tự nhiên theo hình phôi gỗ nguyên khối.',
        avatar: 'https://images.unsplash.com/photo-1472099645785-5658abf4ff4e?w=400&auto=format&fit=crop&q=80'
    }
])
</script>

<style scoped>
.about-page {
    background: #faf8f5;
}

.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.text-center {
    text-align: center;
}

.container-1320 {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
}

.page-content {
    padding: 30px 0 60px;
}

.artisans-section {
    margin-top: 50px;
    background: #f2eae0;
    padding: 50px 0;
}

.sub-title {
    font-size: 12px;
    letter-spacing: 1.5px;
    color: #c59b27;
    font-weight: 700;
    display: block;
}

.section-title {
    font-size: 24px;
    color: #2c1810;
    margin: 6px 0 0;
    font-weight: 700;
}

.gold-divider {
    width: 50px;
    height: 3px;
    background: #c59b27;
    margin: 10px auto 0;
    border-radius: 2px;
}

.artisans-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 24px;
    margin-top: 35px;
}

@media (max-width: 850px) {
    .artisans-grid {
        grid-template-columns: 1fr;
    }
}
</style>