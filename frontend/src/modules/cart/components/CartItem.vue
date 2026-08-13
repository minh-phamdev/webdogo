<template>
    <div class="cart-item">
        <!-- Ảnh sản phẩm -->
        <div class="item-img-wrap">
            <img :src="item.image" :alt="item.name" />
        </div>

        <!-- Thông tin -->
        <div class="item-info">
            <h3 class="item-title capitalize">{{ item.name }}</h3>
            <p class="item-sku">SKU: {{ item.sku }} | Gỗ: {{ item.woodType }}</p>
        </div>

        <!-- Đơn giá -->
        <div class="item-price">
            <span class="price">{{ formatPrice(item.price) }}</span>
            <span v-if="item.oldPrice" class="old-price">{{ formatPrice(item.oldPrice) }}</span>
        </div>

        <!-- Bộ tăng giảm số lượng -->
        <div class="item-quantity">
            <div class="quantity-control bo-rounded">
                <button @click="$emit('update-quantity', -1)">-</button>
                <input type="number" :value="item.quantity" readonly />
                <button @click="$emit('update-quantity', 1)">+</button>
            </div>
        </div>

        <!-- Thành tiền -->
        <div class="item-subtotal red-bold">
            {{ formatPrice(item.price * item.quantity) }}
        </div>

        <!-- Nút Xóa -->
        <button class="btn-remove" @click="$emit('remove')" title="Xóa sản phẩm">
            🗑️
        </button>
    </div>
</template>

<script setup>
defineProps({
    item: {
        type: Object,
        required: true
    }
})

defineEmits(['update-quantity', 'remove'])

const formatPrice = (val) => val.toLocaleString('vi-VN') + 'đ'
</script>

<style scoped>
.cart-item {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 16px 0;
    border-bottom: 1px solid #eee;
}

.cart-item:last-child {
    border-bottom: none;
}

.item-img-wrap {
    width: 80px;
    height: 80px;
    border-radius: 8px;
    overflow: hidden;
    background: #fbf9f6;
    flex-shrink: 0;
}

.item-img-wrap img {
    width: 100%;
    height: 100%;
    object-fit: contain;
}

.item-info {
    flex: 1;
}

.item-title {
    font-size: 15px;
    font-weight: 600;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 4px;
}

.item-sku {
    font-size: 12px;
    color: #888;
    margin: 0;
}

.item-price {
    width: 120px;
    text-align: right;
}

.item-price .price {
    font-size: 15px;
    font-weight: 600;
    color: #333;
}

.item-price .old-price {
    font-size: 12px;
    color: #999;
    text-decoration: line-through;
    display: block;
}

.item-quantity {
    width: 100px;
    display: flex;
    justify-content: center;
}

.quantity-control {
    display: flex;
    border: 1px solid #ddd;
    overflow: hidden;
    border-radius: 4px;
}

.quantity-control button {
    width: 28px;
    height: 28px;
    border: none;
    background: #f8f8f8;
    cursor: pointer;
    font-weight: bold;
}

.quantity-control input {
    width: 36px;
    height: 28px;
    border: none;
    text-align: center;
    font-size: 13px;
}

.item-subtotal {
    width: 120px;
    text-align: right;
    font-size: 16px;
    font-weight: 700;
    color: #d9381e;
}

.btn-remove {
    background: transparent;
    border: none;
    cursor: pointer;
    font-size: 16px;
    opacity: 0.6;
}

.btn-remove:hover {
    opacity: 1;
}
</style>