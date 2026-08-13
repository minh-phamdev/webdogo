<template>
    <div class="factory-photos-card bo-rounded">
        <h3 class="card-title serif">📸 Hình ảnh thực tế chế tác tại xưởng</h3>
        <p class="photo-desc">Ảnh phôi mộc và tiến độ hoàn thiện do thợ chụp gửi trực tiếp từ xưởng Anh Khoa:</p>

        <div class="photo-grid">
            <div v-for="(photo, index) in photos" :key="index" class="photo-item">
                <img :src="photo.url" :alt="photo.caption" />
                <span class="photo-caption">{{ photo.caption }}</span>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    photos: { type: Array, required: true }
})
</script>

<style scoped>
.bo-rounded {
    border-radius: 12px;
}

.factory-photos-card {
    background: #ffffff;
    border: 1px solid #e8e2d9;
    padding: 24px;
}

.card-title {
    font-size: 18px;
    color: #2c1810;
    margin-bottom: 6px;
}

.photo-desc {
    font-size: 13px;
    color: #666;
    margin-bottom: 16px;
}

.photo-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(200px, 1fr));
    gap: 16px;
}

.photo-item img {
    width: 100%;
    height: 140px;
    object-fit: cover;
    border-radius: 8px;
    border: 1px solid #eee;
}

.photo-caption {
    font-size: 12px;
    color: #555;
    margin-top: 6px;
    display: block;
}
</style>