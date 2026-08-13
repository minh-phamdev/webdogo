<template>
    <div class="admin-login-container">
        <div class="login-box">
            <!-- Header Logo & Branding -->
            <div class="login-header">
                <div class="brand-badge">
                    <safety-certificate-outlined class="badge-icon" />
                    <span>INTERNAL SYSTEM</span>
                </div>
                <h2>ĐỒ GỖ ANH KHOA</h2>
                <p class="subtitle">Hệ Thống Quản Trị & Điều Hành Bán Hàng</p>
            </div>

            <!-- Form Đăng Nhập -->
            <a-form :model="formState" :rules="rules" layout="vertical" @finish="handleLogin" class="login-form">
                <!-- Chọn vai trò (Role Selector) -->
                <a-form-item name="role">
                    <div class="role-selector">
                        <button type="button" :class="['role-btn', { active: formState.role === 'staff' }]"
                            @click="formState.role = 'staff'">
                            <user-outlined /> Nhân Viên
                        </button>
                        <button type="button" :class="['role-btn', { active: formState.role === 'admin' }]"
                            @click="formState.role = 'admin'">
                            <crown-outlined /> Quản Trị Viên
                        </button>
                    </div>
                </a-form-item>

                <!-- Tài khoản / Email -->
                <a-form-item label="Tài khoản hoặc Email" name="username">
                    <a-input v-model:value="formState.username" placeholder="Nhập mã nhân viên hoặc email..."
                        size="large">
                        <template #prefix>
                            <user-outlined class="input-icon" />
                        </template>
                    </a-input>
                </a-form-item>

                <!-- Mật khẩu -->
                <a-form-item label="Mật khẩu" name="password">
                    <a-input-password v-model:value="formState.password" placeholder="Nhập mật khẩu..." size="large">
                        <template #prefix>
                            <lock-outlined class="input-icon" />
                        </template>
                    </a-input-password>
                </a-form-item>

                <!-- Ghi nhớ & Quên mật khẩu -->
                <div class="form-options">
                    <a-checkbox v-model:checked="formState.remember" class="remember-checkbox">
                        Ghi nhớ đăng nhập
                    </a-checkbox>
                    <a href="#" @click.prevent="handleForgotPassword" class="forgot-link">
                        Quên mật khẩu?
                    </a>
                </div>

                <!-- Nút Submit -->
                <a-form-item>
                    <a-button type="primary" html-type="submit" size="large" block :loading="loading"
                        class="submit-btn">
                        ĐĂNG NHẬP {{ formState.role === 'admin' ? 'ADMIN' : 'STAFF' }}
                    </a-button>
                </a-form-item>
            </a-form>

            <!-- Footer cảnh báo an toàn -->
            <div class="login-footer">
                <p>🔒 Truy cập được mã hóa SSL 256-bit.</p>
                <p class="warning-text">Chỉ dành cho nhân sự được cấp quyền. Mọi truy cập trái phép đều bị ghi lại IP.
                </p>
            </div>
        </div>
    </div>
</template>

<script setup>
import { reactive, ref } from 'vue'
import { useRouter } from 'vue-router'
import { message } from 'ant-design-vue'
import {
    UserOutlined,
    LockOutlined,
    SafetyCertificateOutlined,
    CrownOutlined,
} from '@ant-design/icons-vue'

const router = useRouter()
const loading = ref(false)

// State Form
const formState = reactive({
    username: '',
    password: '',
    remember: true,
    role: 'staff', // Default: 'staff' hoặc 'admin'
})

// Rules Validation
const rules = {
    username: [
        { required: true, message: 'Vui lòng nhập tài khoản/email!', trigger: 'blur' },
    ],
    password: [
        { required: true, message: 'Vui lòng nhập mật khẩu!', trigger: 'blur' },
        { min: 6, message: 'Mật khẩu phải từ 6 ký tự trở lên!', trigger: 'blur' },
    ],
}

// Xử lý Đăng nhập
const handleLogin = async (values) => {
    loading.value = true
    try {
        // Giả lập gọi API Đăng nhập
        await new Promise((resolve) => setTimeout(resolve, 1200))

        // Lưu token/role vào localStorage (hoặc Pinia Store)
        localStorage.setItem('admin_token', 'mock_token_123456')
        localStorage.setItem('user_role', formState.role)

        message.success(
            `Đăng nhập thành công với quyền ${formState.role === 'admin' ? 'Quản trị viên' : 'Nhân viên'}!`
        )

        // Điều hướng vào trang Dashboard tương ứng
        router.push('/admin/dashboard')
    } catch (error) {
        message.error('Đăng nhập thất bại. Vui lòng kiểm tra lại thông tin!')
    } finally {
        loading.value = false
    }
}

// Xử lý Quên mật khẩu
const handleForgotPassword = () => {
    message.info('Vui lòng liên hệ Trưởng phòng IT để làm lại mật khẩu nội bộ.')
}
</script>

<style scoped>
.admin-login-container {
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center;
    /* Nền nâu gỗ đậm cao cấp phối gradient */
    background: radial-gradient(circle at center, #3B2314 0%, #1A0F08 70%, #0D0704 100%);
    padding: 20px;
    position: relative;
}

.login-box {
    width: 100%;
    max-width: 440px;
    background: rgba(42, 25, 13, 0.85);
    backdrop-filter: blur(12px);
    border: 1px solid rgba(197, 155, 39, 0.35);
    /* Viền mạ vàng nhẹ */
    border-radius: 12px;
    padding: 36px 32px 28px;
    box-shadow: 0 20px 50px rgba(0, 0, 0, 0.6);
}

/* Header Styling */
.login-header {
    text-align: center;
    margin-bottom: 28px;
}

.brand-badge {
    display: inline-flex;
    align-items: center;
    gap: 6px;
    background: rgba(197, 155, 39, 0.15);
    color: var(--wd-gold-400, #C59B27);
    border: 1px solid rgba(197, 155, 39, 0.4);
    padding: 4px 12px;
    border-radius: 20px;
    font-size: 11px;
    font-weight: 700;
    letter-spacing: 1px;
    margin-bottom: 12px;
}

.login-header h2 {
    font-family: var(--font-display, 'Playfair Display', Georgia, serif);
    color: #F4EBDA;
    font-size: 24px;
    font-weight: 700;
    letter-spacing: 1px;
    margin: 0 0 6px;
}

.login-header .subtitle {
    color: #A6937A;
    font-size: 13px;
    margin: 0;
}

/* Role Selector Toggle */
.role-selector {
    display: flex;
    background: rgba(0, 0, 0, 0.3);
    padding: 4px;
    border-radius: 8px;
    border: 1px solid rgba(197, 155, 39, 0.2);
}

.role-btn {
    flex: 1;
    background: transparent;
    border: none;
    color: #A6937A;
    padding: 8px 12px;
    font-size: 13px;
    font-weight: 600;
    border-radius: 6px;
    cursor: pointer;
    transition: all 0.3s ease;
    display: flex;
    align-items: center;
    justify-content: center;
    gap: 6px;
}

.role-btn.active {
    background: linear-gradient(135deg, #C59B27 0%, #A37B1A 100%);
    color: #1A0F08;
    font-weight: 700;
    box-shadow: 0 2px 8px rgba(197, 155, 39, 0.3);
}

/* Form Styling & Overrides */
.login-form :deep(.ant-form-item-label > label) {
    color: #E7DBC8 !important;
    font-size: 13px;
}

.login-form :deep(.ant-input-affix-wrapper) {
    background: rgba(20, 10, 5, 0.6) !important;
    border-color: rgba(197, 155, 39, 0.25) !important;
    color: #FFF !important;
}

.login-form :deep(.ant-input-affix-wrapper:hover),
.login-form :deep(.ant-input-affix-wrapper-focused) {
    border-color: #C59B27 !important;
    box-shadow: 0 0 0 2px rgba(197, 155, 39, 0.2) !important;
}

.login-form :deep(.ant-input) {
    background: transparent !important;
    color: #FFF !important;
}

.input-icon {
    color: #C59B27;
}

/* Remember & Forgot options */
.form-options {
    display: flex;
    justify-content: space-between;
    align-items: center;
    margin-bottom: 20px;
}

.remember-checkbox :deep(span) {
    color: #C9B79E !important;
    font-size: 13px;
}

.remember-checkbox :deep(.ant-checkbox-checked .ant-checkbox-inner) {
    background-color: #C59B27;
    border-color: #C59B27;
}

.forgot-link {
    color: #C59B27;
    font-size: 13px;
    transition: opacity 0.2s;
}

.forgot-link:hover {
    opacity: 0.8;
    text-decoration: underline;
}

/* Submit Button */
.submit-btn {
    background: linear-gradient(135deg, #C59B27 0%, #997315 100%) !important;
    border: none !important;
    color: #120A05 !important;
    font-weight: 700 !important;
    letter-spacing: 1px;
    border-radius: 6px;
    height: 44px;
    box-shadow: 0 4px 15px rgba(197, 155, 39, 0.25);
}

.submit-btn:hover {
    background: linear-gradient(135deg, #D4A933 0%, #B0851D 100%) !important;
    box-shadow: 0 6px 20px rgba(197, 155, 39, 0.4);
}

/* Footer Security Text */
.login-footer {
    margin-top: 24px;
    padding-top: 16px;
    border-top: 1px solid rgba(197, 155, 39, 0.15);
    text-align: center;
}

.login-footer p {
    margin: 2px 0;
    font-size: 12px;
    color: #A6937A;
}

.warning-text {
    font-size: 11px !important;
    color: #8C7862 !important;
}
</style>