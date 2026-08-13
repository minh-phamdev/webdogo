<template>
    <div class="success-banner text-center">
        <div class="success-icon">🎉</div>
        <h1 class="page-title serif">Đặt hàng thành công!</h1>
        <p class="sub-title">
            Cảm ơn Quý khách đã tin tưởng và lựa chọn sản phẩm của <strong>Đồ Gỗ Anh Khoa</strong>.
        </p>
        <div class="order-code-badge">
            Mã đơn hàng của bạn: <strong>#{{ orderCode }}</strong>
        </div>
    </div>
</template>

<script setup>
defineProps({
    orderCode: { type: String, required: true }
})
</script>

<style scoped>
.text-center {
    text-align: center;
}

.success-banner {
    margin-bottom: 30px;
}

.success-icon {
    font-size: 56px;
    margin-bottom: 12px;
}

.page-title {
    font-size: 32px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 8px 0;
}

.sub-title {
    font-size: 15px;
    color: #555;
    margin: 0 0 16px 0;
}

.order-code-badge {
    display: inline-block;
    background: #f0e6d2;
    color: var(--wd-wood-900, #2c1810);
    padding: 8px 20px;
    border-radius: 999px;
    font-size: 15px;
}
</style>