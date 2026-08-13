<template>
    <div class="contact-page">
        <AppHeader />
        <PageHeader title="Liên Hệ & Ghé Thăm Showroom" breadcrumb="Trang chủ / Liên hệ" />

        <main class="page-content">
            <div class="container-1320">
                <div class="contact-grid">
                    <ContactForm @submit-form="onFormSubmit" />
                    <ShowroomInfo />
                </div>

                <!-- Component Bản đồ -->
                <MapLocation />
            </div>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

import ContactForm from '../components/ContactForm.vue'
import ShowroomInfo from '../components/ShowroomInfo.vue'
import MapLocation from '../components/MapLocation.vue'

const onFormSubmit = (data) => {
    alert(`Cảm ơn ${data.fullName}! Thông tin đã gửi thành công. Tư vấn viên sẽ liên hệ lại ngay!`)
}
</script>

<style scoped>
.contact-page {
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

.contact-grid {
    display: grid;
    grid-template-columns: 1.2fr 0.8fr;
    gap: 28px;
}

@media (max-width: 850px) {
    .contact-grid {
        grid-template-columns: 1fr;
    }
}
</style>