<template>
    <div class="product-gallery">
        <!-- Component Ảnh Lớn Chính (Ảnh thực tế UNIQUE) -->
        <div class="main-image-wrap bo-rounded">
            <img :src="mainImage" alt="Tượng Phật Di Lặc Gỗ Hương Nguyên Khối" loading="lazy" />
        </div>

        <!-- Component Lưới Thumbnail (Góc cạnh chi tiết) -->
        <div class="thumbnail-grid">
            <div v-for="(thumb, index) in thumbnails" :key="index" class="thumb-card"
                :class="{ active: index === activeThumbIndex }" @click="activeThumbIndex = index">
                <div class="thumb-img-wrap bo-rounded">
                    <img :src="thumb.src" :alt="thumb.alt" loading="lazy" />
                </div>
                <p class="thumb-caption capitalize">{{ thumb.caption }}</p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { ref, computed } from 'vue';

const thumbnails = [
    { src: 'path/to/quan-cong- hương-front.jpg', alt: 'Mặt trước', caption: 'Mặt trước' },
    { src: 'path/to/quan-cong- hương-back.jpg', alt: 'Mặt sau', caption: 'Mặt sau' },
    { src: 'path/to/detail-faces.jpg', alt: 'Cận cảnh nét mặt', caption: 'Cận cảnh nét mặt' },
    { src: 'path/to/grain.jpg', alt: 'Cận cảnh vân gỗ hương', caption: 'Cận cảnh vân gỗ hương' }
];

const activeThumbIndex = ref(0); // Mặc định ảnh đầu tiên là ảnh chính

// Ảnh chính được cập nhật khi click thumbnail
const mainImage = computed(() => thumbnails[activeThumbIndex.value].src);
</script>

<style scoped>
.product-gallery {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.main-image-wrap {
    width: 100%;
    aspect-ratio: 1 / 1;
    /* Khung vuông chuẩn */
    border: 1px solid var(--wd-line, #eee);
    background-color: #fff;
    display: flex;
    align-items: center;
    justify-content: center;
    padding: 12px;
    box-sizing: border-box;
}

.main-image-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    /* Tượng gỗ hiện trọn vẹn, không đứt hình */
}

.thumbnail-grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 12px;
}

.thumb-card {
    cursor: pointer;
    display: flex;
    flex-direction: column;
    align-items: center;
    gap: 4px;
}

.thumb-img-wrap {
    width: 100%;
    aspect-ratio: 1 / 1;
    border: 1px solid var(--wd-line, #eee);
    background-color: #fbf9f6;
    /* Nền kem nhẹ */
    padding: 8px;
    box-sizing: border-box;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: border-color 0.2s;
}

/* Ảnh thumbnail active có viền vàng gold */
.thumb-card.active .thumb-img-wrap {
    border-color: var(--wd-gold-600, #d4af37);
    box-shadow: 0 0 8px rgba(212, 175, 55, 0.15);
}

.thumb-img-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
}

.thumb-caption {
    margin: 0;
    font-size: 11px;
    color: var(--wd-ink-soft, #888);
    text-align: center;
}
</style>