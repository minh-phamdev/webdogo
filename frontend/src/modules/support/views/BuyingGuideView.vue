<template>
    <AppHeader />
    <div class="support-page">
        <div class="container-1320">
            <div class="page-header text-center">
                <span class="sub-title">MUA HÀNG DỄ DÀNG</span>
                <h1 class="serif main-title">Hướng Dẫn Mua Hàng & Đặt Hàng Theo Yêu Cầu</h1>
                <div class="gold-divider"></div>
            </div>

            <div class="support-layout">
                <main class="guide-content">
                    <!-- Quy trình 5 bước -->
                    <div class="steps-timeline">
                        <div class="step-card bo-rounded shadow">
                            <div class="step-header">
                                <span class="step-badge">Bước 1</span>
                                <h3 class="serif step-title">Chọn Tác Phẩm Hoặc Gửi Yêu Cầu Chế Tác</h3>
                            </div>
                            <p class="step-desc">
                                Quý khách chọn mẫu sản phẩm có sẵn trên Website hoặc gửi kích thước, hình ảnh tượng /
                                nội thất muốn đặt làm riêng qua <strong>Zalo Hotline: 0901 234 567</strong>.
                            </p>
                        </div>

                        <div class="step-card bo-rounded shadow">
                            <div class="step-header">
                                <span class="step-badge">Bước 2</span>
                                <h3 class="serif step-title">Tư Vấn Phong Thủy & Duyệt Phôi Gỗ Mộc</h3>
                            </div>
                            <p class="step-desc">
                                Nghệ nhân sẽ tư vấn hướng đặt, kích thước Thước Lỗ Ban chuẩn phong thủy. Khách hàng được
                                quay video xem trực tiếp phôi gỗ thô nguyên khối trước khi đục.
                            </p>
                        </div>

                        <div class="step-card bo-rounded shadow">
                            <div class="step-header">
                                <span class="step-badge">Bước 3</span>
                                <h3 class="serif step-title">Đặt Cọc & Tiến Hành Chạm Khắc Thủ Công</h3>
                            </div>
                            <p class="step-desc">
                                Quý khách chuyển khoản đặt cọc từ 20% - 30%. Đội ngũ nghệ nhân lão luyện tiến hành đục
                                tay tỉ mỉ từng chi tiết diện mặt tượng.
                            </p>
                        </div>

                        <div class="step-card bo-rounded shadow">
                            <div class="step-header">
                                <span class="step-badge">Bước 4</span>
                                <h3 class="serif step-title">Nghiệm Thu Mộc & Phun Sơn PU</h3>
                            </div>
                            <p class="step-desc">
                                Xưởng gửi ảnh/video nghiệm thu chi tiết mộc. Sau khi khách hàng thực sự ưng ý, xưởng
                                tiến hành sấy & phun PU 6 lớp bảo vệ gỗ.
                            </p>
                        </div>

                        <div class="step-card bo-rounded shadow highlight-step">
                            <div class="step-header">
                                <span class="step-badge gold">Bước 5</span>
                                <h3 class="serif step-title">Giao Hàng Tận Nhà - Kiểm Tra Mới Thanh Toán</h3>
                            </div>
                            <p class="step-desc">
                                Đóng kiện gỗ cẩn thận, vận chuyển tận nơi. Gia chủ mở kiện gỗ kiểm tra đúng chất lượng,
                                vân gỗ rồi mới thanh toán phần tiền còn lại.
                            </p>
                        </div>
                    </div>
                </main>

                <SupportSidebar class="sidebar-col" />
            </div>
        </div>
    </div>
    <AppFooter />
</template>

<script setup>
import SupportSidebar from '../components/SupportSidebar.vue'
import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'
</script>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.bo-rounded {
    border-radius: 12px;
}

.shadow {
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.03);
}

.text-center {
    text-align: center;
}

.support-page {
    background: #faf8f5;
    padding: 40px 0 60px;
    min-height: 80vh;
}

.container-1320 {
    max-width: 1320px;
    margin: 0 auto;
    padding: 0 20px;
}

.sub-title {
    font-size: 12px;
    letter-spacing: 1.5px;
    color: #c59b27;
    font-weight: 700;
}

.main-title {
    font-size: 28px;
    color: #2c1810;
    margin: 6px 0 10px;
    font-weight: 700;
}

.gold-divider {
    width: 60px;
    height: 3px;
    background: #c59b27;
    margin: 0 auto 32px;
    border-radius: 2px;
}

.support-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 32px;
}

.steps-timeline {
    display: flex;
    flex-direction: column;
    gap: 20px;
}

.step-card {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    padding: 24px;
    position: relative;
}

.step-card.highlight-step {
    border: 2px solid #c59b27;
    background: #fffdfa;
}

.step-header {
    display: flex;
    align-items: center;
    gap: 12px;
    margin-bottom: 10px;
}

.step-badge {
    background: #2c1810;
    color: #ffffff;
    font-size: 11px;
    font-weight: 800;
    padding: 4px 10px;
    border-radius: 6px;
    text-transform: uppercase;
}

.step-badge.gold {
    background: #c59b27;
    color: #2c1810;
}

.step-title {
    font-size: 17px;
    color: #a32219;
    margin: 0;
    font-weight: 700;
}

.step-desc {
    font-size: 14px;
    color: #554438;
    line-height: 1.6;
    margin: 0;
}

@media (max-width: 992px) {
    .support-layout {
        grid-template-columns: 1fr;
    }
}
</style>