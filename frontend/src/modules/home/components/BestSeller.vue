<template>
    <section class="best-seller">
        <div class="best-seller-container">
            <div class="section-header">
                <h2 class="section-title">Sản phẩm bán chạy</h2>
                <span class="view-all" @click="goAll">Xem tất cả →</span>
            </div>

            <div class="grid">
                <div v-for="(item, idx) in products" :key="item.id" class="card" :class="{ featured: idx === 0 }"
                    @click="goDetail(item.id)">
                    <div class="img-wrap">
                        <img :src="item.image" :alt="item.name" loading="lazy" />
                        <span v-if="item.discount" class="badge-discount">-{{ item.discount }}%</span>
                        <!-- Von Restorff effect: item đầu tiên có nhãn riêng để mắt dừng lại đầu tiên -->
                        <span v-if="idx === 0" class="top-tag">Bán chạy #1</span>
                    </div>

                    <div class="info">
                        <h3 class="name">{{ item.name }}</h3>

                        <div class="price-row">
                            <div class="price-wrap">
                                <span class="price">{{ formatPrice(item.price) }}</span>
                                <span v-if="item.oldPrice" class="old">{{ formatPrice(item.oldPrice) }}</span>
                            </div>
                        </div>

                        <div class="meta">
                            <span class="rating">★ {{ item.rating.toFixed(1) }}</span>
                            <span class="sold">Đã bán {{ item.sold }}</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const products = [
    { id: 1, name: 'Tượng Phật Di Lặc gỗ hương', price: 1200000, oldPrice: 1500000, discount: 20, rating: 4.9, sold: 320, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 2, name: 'Tượng Thần Tài phong thủy cao cấp', price: 950000, oldPrice: 1050000, discount: 10, rating: 4.8, sold: 210, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 3, name: 'Tượng Linh Vật Tỳ Hưu Gỗ Cẩm', price: 1800000, discount: 0, rating: 5.0, sold: 150, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 4, name: 'Tượng Quan Công Gỗ Mun', price: 2500000, oldPrice: 3000000, discount: 17, rating: 4.9, sold: 95, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 4, name: 'Tượng Quan Công Gỗ Mun', price: 2500000, oldPrice: 3000000, discount: 17, rating: 4.9, sold: 95, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 4, name: 'Tượng Quan Công Gỗ Mun', price: 2500000, oldPrice: 3000000, discount: 17, rating: 4.9, sold: 95, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 4, name: 'Tượng Quan Công Gỗ Mun', price: 2500000, oldPrice: 3000000, discount: 17, rating: 4.9, sold: 95, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 4, name: 'Tượng Quan Công Gỗ Mun', price: 2500000, oldPrice: 3000000, discount: 17, rating: 4.9, sold: 95, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' }
]

const goDetail = (id) => {
    if (!id) return
    router.push(`/product/${id}`)
}

const goAll = () => {
    router.push('/products')
}

const formatPrice = (price) => {
    if (!price || isNaN(price)) return '0đ'
    return price.toLocaleString('vi-VN') + 'đ'
}
</script>

<style scoped>
/* =====================================================
   CONTAINER & SECTION
===================================================== */
.best-seller {
    width: 100%;
    background: var(--wd-bg, #fdfcfb);
    font-family: var(--font-body, sans-serif);
}

.best-seller-container {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 40px 20px 60px;
    box-sizing: border-box;
}

/* =====================================================
   HEADER
===================================================== */
.section-header {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 24px;
}

.section-title {
    position: relative;
    display: inline-block;
    margin: 0;
    padding-bottom: 8px;
    font-family: var(--font-display, serif);
    font-size: 26px;
    font-weight: 700;
    color: var(--wd-wood-900, #2c1810);
}

.section-title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 48px;
    height: 3px;
    background: var(--wd-gold-600, #d4af37);
    border-radius: 999px;
}

.view-all {
    cursor: pointer;
    color: var(--wd-wood-700, #5d4037);
    font-size: 14px;
    font-weight: 600;
    transition: color .2s ease;
}

.view-all:hover {
    color: var(--wd-accent, #c0392b);
}

/* =====================================================
   GRID
===================================================== */
.grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
    width: 100%;
}

/* =====================================================
   CARD STANDARD
===================================================== */
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    background: var(--wd-surface, #fff);
    border: 1px solid var(--wd-line, #eee);
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: var(--wd-shadow-sm, 0 2px 8px rgba(0, 0, 0, 0.04));
    transition: transform 0.25s ease, border-color 0.25s ease, box-shadow 0.25s ease;
}

/* Card nổi bật có viền vàng mảnh chuẩn */
.card.featured {
    border: 1px solid var(--wd-gold-600, #d4af37);
    box-shadow: 0 8px 22px rgba(184, 134, 11, .1);
}

.card:hover {
    transform: translateY(-4px);
    border-color: var(--wd-gold-400, #e6ca65);
    box-shadow: var(--wd-shadow-md, 0 6px 16px rgba(0, 0, 0, 0.08));
}

/* =====================================================
   IMAGE WRAP (Kỹ thuật Fit tượng gỗ)
===================================================== */
.img-wrap {
    width: 100%;
    aspect-ratio: 1 / 1;
    /* Khung vuông chuẩn */
    padding: 12px;
    box-sizing: border-box;
    background: #fbf9f6;
    /* Nền kem nhẹ */
    display: flex;
    align-items: center;
    justify-content: center;
    position: relative;
    overflow: hidden;
}

.img-wrap img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    /* Tượng gỗ hiện trọn vẹn, không đứt hình */
    transition: transform 0.3s ease;
}

.card:hover .img-wrap img {
    transform: scale(1.05);
}

/* =====================================================
   BADGES & TAGS
===================================================== */
.badge-discount {
    position: absolute;
    top: 8px;
    left: 8px;
    z-index: 5;
    background: var(--wd-accent, #c0392b);
    color: #fff;
    font-size: 11px;
    font-weight: 700;
    padding: 3px 6px;
    border-radius: 4px;
    line-height: 1;
}

.top-tag {
    position: absolute;
    top: 8px;
    right: 8px;
    z-index: 5;
    background: var(--wd-gold-600, #d4af37);
    color: #fff;
    font-size: 10px;
    font-weight: 700;
    padding: 4px 8px;
    border-radius: 4px;
    text-transform: uppercase;
    letter-spacing: 0.5px;
    line-height: 1;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

/* =====================================================
   INFO & TYPOGRAPHY
===================================================== */
.info {
    padding: 12px 14px 14px;
    display: flex;
    flex-direction: column;
    flex-grow: 1;
}

.name {
    margin: 0;
    font-size: 14px;
    font-weight: 600;
    line-height: 1.4;
    color: var(--wd-ink, #222);
    /* Giới hạn tên tối đa 2 dòng sạch sẽ */
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 2;
    overflow: hidden;
    transition: color 0.3s ease;
}

.card:hover .name {
    color: var(--wd-gold-600, #b8860b);
}

.price-row {
    margin-top: auto;
    /* Đẩy cụm giá xuống đáy card */
    padding-top: 8px;
}

.price-wrap {
    display: flex;
    align-items: baseline;
    flex-wrap: wrap;
    gap: 6px;
}

.price {
    color: var(--wd-accent, #c0392b);
    font-size: 16px;
    font-weight: 700;
    line-height: 1.2;
}

.old {
    font-size: 12px;
    text-decoration: line-through;
    color: var(--wd-ink-soft, #888);
}

.meta {
    margin-top: 8px;
    display: flex;
    justify-content: space-between;
    font-size: 11px;
    color: var(--wd-ink-soft, #888);
    border-top: 1px solid #f5f5f5;
    padding-top: 8px;
}

.rating {
    color: var(--wd-gold-600, #d4af37);
    font-weight: 600;
}

/* =====================================================
   RESPONSIVE
===================================================== */
@media (max-width: 1024px) {
    .best-seller-container {
        padding: 40px 16px;
    }

    .grid {
        grid-template-columns: repeat(3, 1fr);
        gap: 12px;
    }
}

@media (max-width: 768px) {
    .section-title {
        font-size: 22px;
    }

    .grid {
        grid-template-columns: repeat(2, 1fr);
    }

    .img-wrap {
        padding: 8px;
    }
}

@media (max-width: 480px) {
    .price {
        font-size: 14px;
    }

    .name {
        font-size: 13px;
    }

    .old {
        font-size: 11px;
    }
}
</style>