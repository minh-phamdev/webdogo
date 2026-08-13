<template>
    <div class="empty-cart-card bo-rounded">
        <div class="empty-icon">🛒</div>
        <h2>Giỏ hàng của bạn đang trống</h2>
        <p>Hãy chọn cho mình những tác phẩm gỗ phong thủy ưng ý nhất nhé!</p>
        <router-link to="/" class="btn btn-gold bo-rounded">
            Khám phá sản phẩm
        </router-link>
    </div>
</template>

<style scoped>
.empty-cart-card {
    background: #ffffff;
    border: 1px solid var(--wd-line, #e8e2d9);
    padding: 48px 24px;
    text-align: center;
    margin: 20px 0;
}

.bo-rounded {
    border-radius: 12px;
}

.empty-icon {
    font-size: 48px;
    margin-bottom: 12px;
}

.empty-cart-card h2 {
    font-size: 20px;
    color: var(--wd-wood-900, #2c1810);
    margin-bottom: 8px;
}

.empty-cart-card p {
    color: #777;
    font-size: 14px;
    margin-bottom: 20px;
}

.btn-gold {
    display: inline-block;
    background: var(--wd-gold-600, #d4af37);
    color: #fff;
    padding: 10px 24px;
    text-decoration: none;
    font-weight: 600;
    font-size: 14px;
}
</style>