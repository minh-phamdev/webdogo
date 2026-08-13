<template>
    <div class="details-card bo-rounded">
        <h3 class="card-title serif">📦 Sản phẩm trong đơn hàng</h3>

        <div class="items-list">
            <div v-for="item in items" :key="item.id" class="item-row">
                <img :src="item.image" :alt="item.name" class="item-img" />
                <div class="item-info">
                    <strong class="item-name">{{ item.name }}</strong>
                    <span class="item-spec">Chất gỗ: <strong>{{ item.woodType }}</strong></span>
                    <span class="item-spec">Kích thước: <strong>{{ item.dimensions }}</strong></span>
                    <span class="item-qty">Số lượng: x{{ item.quantity }}</span>
                </div>
                <div class="item-price">{{ formatPrice(item.price * item.quantity) }}</div>
            </div>
        </div>
    </div>
</template>

<script setup>
defineProps({
    items: { type: Array, required: true }
})

const formatPrice = (val) => val.toLocaleString('vi-VN') + 'đ'
</script>

<style scoped>
.bo-rounded {
    border-radius: 12px;
}

.details-card {
    background: #ffffff;
    border: 1px solid #e8e2d9;
    padding: 24px;
}

.card-title {
    font-size: 18px;
    color: #2c1810;
    margin-bottom: 16px;
}

.items-list {
    display: flex;
    flex-direction: column;
}

.item-row {
    display: flex;
    align-items: center;
    gap: 16px;
    padding: 12px 0;
    border-bottom: 1px solid #f0f0f0;
}

.item-row:last-child {
    border-bottom: none;
}

.item-img {
    width: 65px;
    height: 65px;
    object-fit: contain;
    border-radius: 6px;
    background: #fbf9f6;
    border: 1px solid #eee;
}

.item-info {
    flex: 1;
    display: flex;
    flex-direction: column;
    gap: 3px;
}

.item-name {
    font-size: 14px;
    color: #2c1810;
}

.item-spec,
.item-qty {
    font-size: 12px;
    color: #666;
}

.item-price {
    font-weight: bold;
    color: #d9381e;
    font-size: 15px;
}
</style>