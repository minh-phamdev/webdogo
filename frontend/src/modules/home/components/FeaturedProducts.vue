<template>
    <section class="products">
        <h2 class="title">Sản phẩm nổi bật</h2>

        <div class="grid">
            <div v-for="item in products" :key="item.id" class="card" @click="goTo(item.id)">
                <span v-if="item.discount" class="badge">-{{ item.discount }}%</span>

                <div class="img-wrap">
                    <img :src="item.image" :alt="item.name" loading="lazy" />
                </div>

                <div class="card-body">
                    <h3>{{ item.name }}</h3>
                    <p class="price">{{ formatPrice(item.price) }}</p>
                    <p class="micro-trust">Còn hàng · Giao trong 3-5 ngày</p>
                </div>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

// Đã cập nhật lại ID duy nhất (1 -> 8)
const products = [
    { id: 1, name: 'Tượng Phật Di Lặc', price: 1200000, discount: 20, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 2, name: 'Tượng Quan Công Gỗ', price: 1500000, discount: 15, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 3, name: 'Tượng Thần Tài Thổ Địa', price: 950000, discount: 10, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 4, name: 'Tượng Rồng Phong Thủy', price: 2000000, discount: 25, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 5, name: 'Tượng Di Lặc Ngũ Phúc', price: 1800000, discount: 20, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 6, name: 'Tượng Đạt Ma Sư Tổ', price: 2200000, discount: 10, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 7, name: 'Linh Vật Kỳ Lân Gỗ', price: 1350000, discount: 15, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' },
    { id: 8, name: 'Lục Bình Gỗ Cẩm', price: 3100000, discount: 30, image: 'https://cuahangnoithat.vn/sites/default/files/tu-van/tuong-quan-cong.jpg' }
]

const goTo = (id) => {
    if (!id) return
    router.push(`/product/${id}`)
}

const formatPrice = (price) => {
    if (!price || isNaN(price)) return '0đ'
    return price.toLocaleString('vi-VN') + 'đ'
}
</script>

<style scoped>
.products {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 20px 20px 40px;
    box-sizing: border-box;
}

.title {
    position: relative;
    display: inline-block;
    margin: 0 0 20px;
    padding-bottom: 6px;
    font-size: 22px;
    font-weight: 700;
    color: #2c1810;
}

.title::after {
    content: '';
    position: absolute;
    left: 0;
    bottom: 0;
    width: 40px;
    height: 3px;
    background: #d4af37;
    border-radius: 999px;
}

.grid {
    display: grid;
    grid-template-columns: repeat(4, 1fr);
    gap: 16px;
}

.card {
    position: relative;
    display: flex;
    flex-direction: column;
    background: #fff;
    border: 1px solid #eee;
    border-radius: 12px;
    overflow: hidden;
    cursor: pointer;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.03);
    transition: transform 0.2s ease, border-color 0.2s ease, box-shadow 0.2s ease;
}

/* Fit trọn ảnh trong khung */
.img-wrap {
    width: 100%;
    aspect-ratio: 1 / 1;
    padding: 12px;
    box-sizing: border-box;
    background: #fbf9f6;
    display: flex;
    align-items: center;
    justify-content: center;
}

.card img {
    max-width: 100%;
    max-height: 100%;
    object-fit: contain;
    /* Đảm bảo bức tượng hiện nguyên vẹn trong khung vuông */
    transition: transform 0.3s ease;
}

.card-body {
    display: flex;
    flex-direction: column;
    padding: 12px;
    text-align: center;
}

.card h3 {
    margin: 0 0 6px;
    font-size: 14px;
    font-weight: 600;
    color: #222;
    line-height: 1.3;
    display: -webkit-box;
    -webkit-box-orient: vertical;
    -webkit-line-clamp: 1;
    overflow: hidden;
}

.price {
    margin: 2px 0 4px;
    font-size: 15px;
    font-weight: 700;
    color: #c0392b;
}

.micro-trust {
    margin: 0;
    font-size: 11px;
    color: #888;
}

.badge {
    position: absolute;
    top: 8px;
    left: 8px;
    z-index: 5;
    padding: 3px 6px;
    color: #fff;
    background: #c0392b;
    border-radius: 4px;
    font-size: 10px;
    font-weight: 700;
}

.card:hover {
    transform: translateY(-3px);
    border-color: #d4af37;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
}

.card:hover img {
    transform: scale(1.05);
}

@media (max-width: 1024px) {
    .grid {
        grid-template-columns: repeat(3, 1fr);
    }
}

@media (max-width: 600px) {
    .grid {
        grid-template-columns: repeat(2, 1fr);
        gap: 10px;
    }
}
</style>