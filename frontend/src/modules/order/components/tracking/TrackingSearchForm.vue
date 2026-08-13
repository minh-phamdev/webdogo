<template>
    <div class="search-card bo-rounded">
        <h1 class="page-title serif text-center">🔎 Tra cứu tiến độ chế tác & Giao hàng</h1>
        <p class="search-subtitle text-center">
            Nhập mã đơn hàng và số điện thoại để kiểm tra tiến độ xưởng chế tác đồ gỗ của bạn
        </p>

        <form @submit.prevent="onSubmit" class="search-form">
            <div class="form-group">
                <label>Mã đơn hàng</label>
                <input v-model.trim="formData.orderCode" type="text" placeholder="Ví dụ: WD889922" required />
            </div>
            <div class="form-group">
                <label>Số điện thoại đặt hàng</label>
                <input v-model.trim="formData.phone" type="tel" placeholder="Ví dụ: 0988123456" required />
            </div>
            <button type="submit" class="btn-search bo-rounded">
                🔍 Tra cứu ngay
            </button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const emit = defineEmits(['search'])

const formData = ref({
    orderCode: '',
    phone: ''
})

const onSubmit = () => {
    emit('search', { ...formData.value })
}
</script>

<style scoped>
.bo-rounded {
    border-radius: 12px;
}

.text-center {
    text-align: center;
}

.search-card {
    background: #ffffff;
    border: 1px solid #e8e2d9;
    padding: 32px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.03);
}

.page-title {
    font-size: 26px;
    color: #2c1810;
    margin-bottom: 8px;
}

.search-subtitle {
    font-size: 14px;
    color: #666;
    margin-bottom: 24px;
}

.search-form {
    display: grid;
    grid-template-columns: 1fr 1fr auto;
    gap: 16px;
    align-items: end;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.form-group label {
    font-size: 13px;
    font-weight: 600;
    color: #2c1810;
}

.form-group input {
    padding: 10px 14px;
    border: 1px solid #ccc;
    border-radius: 6px;
    font-size: 14px;
}

.btn-search {
    background: var(--wd-wood-900, #2c1810);
    color: #ffffff;
    border: none;
    padding: 11px 24px;
    font-size: 14px;
    font-weight: 600;
    cursor: pointer;
}

@media (max-width: 768px) {
    .search-form {
        grid-template-columns: 1fr;
    }
}
</style>