<template>
    <div class="contact-form-card bo-rounded">
        <h3 class="serif form-title">Đăng Ký Tư Vấn & Đặt Tượng Theo Yêu Cầu</h3>
        <p class="form-sub">Để lại thông tin, nghệ nhân tư vấn sẽ liên hệ lại trong 15 phút.</p>

        <form @submit.prevent="handleSubmit">
            <div class="form-group">
                <label>Họ và tên *</label>
                <input type="text" v-model="form.fullName" required placeholder="Ví dụ: Nguyễn Văn A" />
            </div>

            <div class="form-row">
                <div class="form-group">
                    <label>Số điện thoại / Zalo *</label>
                    <input type="tel" v-model="form.phone" required placeholder="0901 234 567" />
                </div>
                <div class="form-group">
                    <label>Nhu cầu sản phẩm</label>
                    <select v-model="form.topic">
                        <option value="tuong-phat">Tượng Phật / Di Lặc</option>
                        <option value="linh-vat">Linh vật Phong thủy</option>
                        <option value="custom">Đục tượng theo thước Lỗ Ban</option>
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label>Ghi chú yêu cầu (Loại gỗ, kích thước...)</label>
                <textarea v-model="form.message" rows="4"
                    placeholder="Ví dụ: Cần tượng Di Lặc gỗ hương cao 81cm..."></textarea>
            </div>

            <button type="submit" class="btn-submit-gold">Gửi Yêu Cầu Tư Vấn</button>
        </form>
    </div>
</template>

<script setup>
import { ref } from 'vue'

const emit = defineEmits(['submit-form'])
const form = ref({ fullName: '', phone: '', topic: 'tuong-phat', message: '' })

const handleSubmit = () => {
    emit('submit-form', { ...form.value })
    form.value = { fullName: '', phone: '', topic: 'tuong-phat', message: '' }
}
</script>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.bo-rounded {
    border-radius: 12px;
}

.contact-form-card {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    padding: 28px;
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.03);
}

.form-title {
    font-size: 20px;
    color: #2c1810;
    margin: 0 0 6px 0;
    font-weight: 700;
}

.form-sub {
    font-size: 13px;
    color: #7a685b;
    margin-bottom: 20px;
}

.form-group {
    margin-bottom: 16px;
}

.form-row {
    display: grid;
    grid-template-columns: 1fr 1fr;
    gap: 16px;
}

label {
    display: block;
    font-size: 13px;
    font-weight: 600;
    color: #2c1810;
    margin-bottom: 6px;
}

input,
select,
textarea {
    width: 100%;
    padding: 10px 14px;
    border: 1px solid #e8dfd5;
    border-radius: 6px;
    font-size: 13px;
    background: #faf8f5;
    color: #2c1810;
    outline: none;
    box-sizing: border-box;
}

input:focus,
select:focus,
textarea:focus {
    border-color: #c59b27;
    background: #ffffff;
}

.btn-submit-gold {
    width: 100%;
    background: #c59b27;
    color: #ffffff;
    border: none;
    padding: 12px;
    border-radius: 6px;
    font-size: 14px;
    font-weight: 700;
    cursor: pointer;
    transition: all 0.2s;
}

.btn-submit-gold:hover {
    background: #2c1810;
    color: #e6c675;
}

@media (max-width: 600px) {
    .form-row {
        grid-template-columns: 1fr;
    }
}
</style>