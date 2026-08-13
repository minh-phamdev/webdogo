<template>
    <div class="checkout-form-card bo-rounded">
        <h2 class="form-title serif">1. Thông tin giao hàng</h2>

        <div class="form-grid">
            <!-- Họ và tên -->
            <div class="form-group col-12">
                <label>Họ và tên người nhận <span class="required">*</span></label>
                <input type="text" v-model="formData.fullName" placeholder="Ví dụ: Nguyễn Văn A" required />
            </div>

            <!-- Số điện thoại & Email -->
            <div class="form-group col-6">
                <label>Số điện thoại <span class="required">*</span></label>
                <input type="tel" v-model="formData.phone" placeholder="Ví dụ: 0988123456" required />
            </div>

            <div class="form-group col-6">
                <label>Email (Nhận hóa đơn điện tử)</label>
                <input type="email" v-model="formData.email" placeholder="email@example.com" />
            </div>

            <!-- Chọn Tỉnh/Thành, Quận/Huyện, Phường/Xã -->
            <div class="form-group col-4">
                <label>Tỉnh / Thành phố <span class="required">*</span></label>
                <select v-model="formData.province" required>
                    <option value="">-- Chọn Tỉnh/Thành --</option>
                    <option value="Hà Nội">Hà Nội</option>
                    <option value="TP. Hồ Chí Minh">TP. Hồ Chí Minh</option>
                    <option value="Đà Nẵng">Đà Nẵng</option>
                    <option value="Bắc Ninh">Bắc Ninh</option>
                </select>
            </div>

            <div class="form-group col-4">
                <label>Quận / Huyện <span class="required">*</span></label>
                <select v-model="formData.district" required>
                    <option value="">-- Chọn Quận/Huyện --</option>
                    <option value="Cầu Giấy">Cầu Giấy</option>
                    <option value="Ba Đình">Ba Đình</option>
                    <option value="Thạch Thất">Thạch Thất</option>
                </select>
            </div>

            <div class="form-group col-4">
                <label>Phường / Xã <span class="required">*</span></label>
                <select v-model="formData.ward" required>
                    <option value="">-- Chọn Phường/Xã --</option>
                    <option value="Dịch Vọng">Dịch Vọng</option>
                    <option value="Yên Hòa">Yên Hòa</option>
                </select>
            </div>

            <!-- Địa chỉ cụ thể -->
            <div class="form-group col-12">
                <label>Địa chỉ cụ thể <span class="required">*</span></label>
                <input type="text" v-model="formData.addressDetail" placeholder="Số nhà, tên đường, thôn/xóm..."
                    required />
            </div>

            <!-- Ghi chú đơn hàng -->
            <div class="form-group col-12">
                <label>Ghi chú giao hàng & Yêu cầu phong thủy (không bắt buộc)</label>
                <textarea v-model="formData.note" rows="3"
                    placeholder="Ví dụ: Giao vào giờ hành chính, bọc xốp chống va đập kỹ giúp tôi..."></textarea>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, watch } from 'vue'

const emit = defineEmits(['update-form'])

const formData = reactive({
    fullName: '',
    phone: '',
    email: '',
    province: '',
    district: '',
    ward: '',
    addressDetail: '',
    note: ''
})

watch(formData, (newVal) => {
    emit('update-form', newVal)
}, { deep: true })
</script>

<style scoped>
.checkout-form-card {
    background: #ffffff;
    border: 1px solid var(--wd-line, #e8e2d9);
    padding: 24px;
}

.bo-rounded {
    border-radius: 12px;
}

.form-title {
    font-size: 20px;
    color: var(--wd-wood-900, #2c1810);
    margin: 0 0 20px 0;
    padding-bottom: 10px;
    border-bottom: 1px solid #eee;
}

.form-grid {
    display: flex;
    flex-wrap: wrap;
    gap: 16px;
}

.form-group {
    display: flex;
    flex-direction: column;
    gap: 6px;
}

.col-12 {
    width: 100%;
}

.col-6 {
    width: calc(50% - 8px);
}

.col-4 {
    width: calc(33.333% - 11px);
}

.form-group label {
    font-size: 13px;
    font-weight: 600;
    color: #333;
}

.required {
    color: #d9381e;
}

.form-group input,
.form-group select,
.form-group textarea {
    width: 100%;
    border: 1px solid #ddd;
    border-radius: 8px;
    padding: 10px 12px;
    font-family: inherit;
    font-size: 14px;
    box-sizing: border-box;
    outline: none;
    transition: border-color 0.2s;
}

.form-group input:focus,
.form-group select:focus,
.form-group textarea:focus {
    border-color: var(--wd-gold-600, #d4af37);
}

@media (max-width: 768px) {

    .col-6,
    .col-4 {
        width: 100%;
    }
}
</style>