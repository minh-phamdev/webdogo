<template>
    <div class="products-wrapper">
        <div class="product-grid">
            <div v-for="item in products" :key="item.id" class="product-card bo-rounded">

                <!-- Khung ảnh chuẩn phom -->
                <div class="img-box">
                    <img :src="item.image" :alt="item.name" />
                    <span class="wood-tag">{{ item.woodType }}</span>
                </div>

                <!-- Nội dung thông tin -->
                <div class="card-body">
                    <h3 class="product-name serif">
                        <router-link :to="`/product/${item.id}`">{{ item.name }}</router-link>
                    </h3>
                    <p class="product-size">📐 {{ item.dimensions }}</p>

                    <div class="card-footer">
                        <div class="price-box">
                            <span class="price-val">{{ formatPrice(item.price) }}</span>
                        </div>

                        <button class="btn-cart-gold" title="Thêm vào giỏ hàng">
                            🛒 Add
                        </button>
                    </div>
                </div>

            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    products: { type: Array, required: true }
})

const formatPrice = (val) => val.toLocaleString('vi-VN') + 'đ'
</script>

<style scoped>
.serif {
    font-family: 'Playfair Display', 'Merriweather', Georgia, serif;
}

.product-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 22px;
}

.bo-rounded {
    border-radius: 12px;
}

.product-card {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 12px rgba(44, 24, 16, 0.03);
}

.product-card:hover {
    transform: translateY(-5px);
    box-shadow: 0 12px 24px rgba(44, 24, 16, 0.1);
    border-color: #c59b27;
}

.img-box {
    position: relative;
    height: 240px;
    background: #fbf9f6;
    display: flex;
    align-items: center;
    justify-content: center;
    overflow: hidden;
}

.img-box img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.5s ease;
}

.product-card:hover .img-box img {
    transform: scale(1.05);
}

/* Badge Chất liệu gỗ sang trọng */
.wood-tag {
    position: absolute;
    top: 12px;
    left: 12px;
    background: rgba(44, 24, 16, 0.9);
    color: #e6c675;
    padding: 4px 10px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    letter-spacing: 0.3px;
    border: 1px solid rgba(230, 198, 117, 0.3);
}

.card-body {
    padding: 16px;
}

.product-name {
    font-size: 15px;
    margin: 0 0 8px 0;
    line-height: 1.4;
    font-weight: 700;
    height: 42px;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
    overflow: hidden;
}

.product-name a {
    color: #2c1810;
    text-decoration: none;
    transition: color 0.2s;
}

.product-name a:hover {
    color: #c59b27;
}

.product-size {
    font-size: 12px;
    color: #7a685b;
    margin: 0 0 14px 0;
}

.card-footer {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.price-val {
    color: #a32219;
    font-weight: 700;
    font-size: 17px;
}

/* Nút giỏ hàng đồng màu Vàng Hổ Phách nút Mua Ngay */
.btn-cart-gold {
    background: #c59b27;
    color: #ffffff;
    border: none;
    padding: 7px 14px;
    border-radius: 6px;
    cursor: pointer;
    font-size: 12px;
    font-weight: 600;
    transition: background 0.2s;
}

.btn-cart-gold:hover {
    background: #2c1810;
    color: #e6c675;
}

@media (max-width: 992px) {
    .product-grid {
        grid-template-columns: repeat(2, 1fr);
    }
}
</style>