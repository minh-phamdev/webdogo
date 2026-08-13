<template>
    <section class="promo">
        <div class="promo-box" @click="goToSale">
            <div class="content">
                <h2>Flash Sale 30%</h2>
                <p>Chỉ hôm nay · Số lượng có hạn</p>
                <button class="buy-now-btn">Mua ngay</button>
            </div>
        </div>
    </section>
</template>

<script setup>
import { useRouter } from 'vue-router'
const router = useRouter()

const goToSale = () => {
    router.push('/sale')
}
</script>

<style scoped>
/* Định nghĩa các biến màu sắc và phông chữ nhất quán */
:root {
    --wd-bg: #f9f6f1;
    /* Nền kem ấm nhẹ */
    --wd-wood-900: #3e2718;
    /* Nâu gỗ đậm */
    --wd-wood-700: #6d472c;
    /* Nâu gỗ trung bình */
    --wd-gold-600: #d4a03c;
    /* Vàng đồng ấm */
    --wd-gold-400: #ffc272;
    /* Vàng đồng nhạt */
    --font-display: 'Merriweather', serif;
    /* Phông chữ tiêu đề serif cao cấp */
    --font-body: 'Avenir', 'Helvetica Neue', sans-serif;
    /* Phông chữ thân sạch sẽ */
    --wd-shadow-sm: 0 4px 12px rgba(0, 0, 0, 0.08);
    --wd-shadow-md: 0 8px 24px rgba(0, 0, 0, 0.12);
}

.promo {
    padding: 60px 10%;
    /* Tăng đệm để có bố cục cân bằng */
    background-color: var(--wd-bg);
    display: flex;
    justify-content: center;
    align-items: center;
}

.promo-box {
    /* Gradient nâu gỗ -> vàng đồng, ấm áp và cao cấp */
    background: linear-gradient(120deg, var(--wd-wood-900) 0%, var(--wd-wood-700) 55%, var(--wd-gold-600) 130%);
    border-radius: 20px;
    padding: 40px 60px;
    /* Tăng đệm nội bộ */
    color: #fff;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: space-between;
    /* Căn chỉnh nội dung trái, nút phải */
    transition: transform 0.3s ease, border-color 0.3s ease, box-shadow 0.3s ease;
    font-family: var(--font-body);
    max-width: 900px;
    /* Giới hạn chiều rộng của hộp */
    width: 100%;
    box-shadow: var(--wd-shadow-sm);
    position: relative;
    /* Dùng cho các yếu tố trang trí nếu có */
    overflow: hidden;
    /* Dùng cho hiệu ứng tràn */
}

/* Thêm các nét chạm khắc mờ mờ trên hộp để tăng tính đồ gỗ */
.promo-box::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    width: 100%;
    height: 100%;
    background-image: url('path/to/subtle-wood-grain-pattern.png');
    /* Cần một hình ảnh kết cấu mờ */
    background-size: cover;
    opacity: 0.15;
    z-index: 0;
}

.promo-box:hover {
    transform: translateY(-5px) scale(1.015);
    /* Nổi lên nhẹ nhàng */
    box-shadow: var(--wd-shadow-md);
}

.content {
    z-index: 1;
    /* Nằm trên lớp trang trí nền */
    max-width: 60%;
}

.content h2 {
    font-family: var(--font-display);
    /* Phông serif cao cấp */
    font-size: 32px;
    /* Tăng kích thước */
    font-weight: 700;
    margin: 0;
    letter-spacing: 0.5px;
}

.content p {
    margin: 10px 0 0;
    color: #EFE6D5;
    /* Màu mờ kem-trắng */
    font-size: 16px;
    line-height: 1.5;
}

.buy-now-btn {
    background-color: #fff;
    color: var(--wd-wood-900);
    border: none;
    padding: 12px 30px;
    border-radius: 8px;
    font-weight: 600;
    cursor: pointer;
    transition: background-color 0.2s ease, color 0.2s ease;
    font-family: var(--font-body);
    font-size: 16px;
    white-space: nowrap;
    /* Tránh ngắt dòng trên nút */
    z-index: 1;
    box-shadow: 0 2px 6px rgba(0, 0, 0, 0.1);
}

.buy-now-btn:hover {
    background-color: var(--wd-gold-400);
    /* Màu vàng đồng nhạt khi hover */
    color: #fff;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
}
</style>