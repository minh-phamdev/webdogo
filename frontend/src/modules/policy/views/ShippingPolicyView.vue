<template>
    <AppHeader />
    <div class="policy-page">
        <div class="container-1320">
            <div class="page-header text-center">
                <span class="sub-title">AN TOÀN TẬN TAY</span>
                <h1 class="serif main-title">Chính Sách Vận Chuyển & Lắp Đặt</h1>
                <div class="gold-divider"></div>
            </div>

            <div class="policy-layout">
                <main class="policy-content bo-rounded shadow">
                    <section class="policy-block">
                        <h2 class="serif block-title">1. Quy trình đóng gói đồ gỗ mỹ nghệ</h2>
                        <p class="paragraph">
                            Các sản phẩm tượng gỗ đục thủ công chi tiết tinh xảo được đóng gói qua <strong>3 lớp bảo vệ
                                chuyên dụng</strong> trước khi xuất xưởng:
                        </p>
                        <div class="packaging-grid">
                            <div class="pack-card bo-rounded">
                                <span class="step-num">Lớp 1</span>
                                <h4>Màng Xốp Cáp & Bọc Khí</h4>
                                <p>Bọc kín các vảy áo, ngón tay, cành hoa chi tiết nhỏ chống sứt mẻ.</p>
                            </div>
                            <div class="pack-card bo-rounded">
                                <span class="step-num">Lớp 2</span>
                                <h4>Thùng Carton 5 Lớp</h4>
                                <p>Chống ẩm, chịu lực nén nhẹ và giữ cố định tư thế tượng.</p>
                            </div>
                            <div class="pack-card bo-rounded">
                                <span class="step-num">Lớp 3</span>
                                <h4>Kiện Gỗ Thở Pallet</h4>
                                <p>Đóng khung gỗ tự nhiên bên ngoài đối với đơn hàng gửi xe tải/Tỉnh xa.</p>
                            </div>
                        </div>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">2. Cước phí & Thời gian giao hàng</h2>
                        <ul class="shipping-fee-list">
                            <li>
                                <strong>Nội thành Hà Nội & TP.HCM:</strong> Miễn phí vận chuyển cho đơn hàng từ
                                10.000.000đ. Giao nhanh trong 24 giờ.
                            </li>
                            <li>
                                <strong>Các Tỉnh/Thành khác:</strong> Giao hàng từ 2 - 4 ngày qua xe tải chuyên dụng
                                hoặc dịch vụ Viettel Post / Bưu Điện. Hỗ trợ 50% cước phí đóng kiện gỗ.
                            </li>
                        </ul>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">3. Quyền kiểm tra & Lắp đặt tại nhà</h2>
                        <div class="highlight-box bo-rounded">
                            📌 <strong>QUYỀN LỢI ĐẶC BIỆT:</strong> Khách hàng ĐƯỢC MỞ KIỆN GỖ KIỂM TRA TƯỢNG, đúng vân
                            gỗ, đúng kích thước rồi mới thanh toán tiền cho bên giao hàng.
                        </div>
                        <p class="paragraph" style="margin-top: 12px;">
                            Đối với bàn thờ, bàn ghế phòng khách hoặc tác phẩm tượng lớn, đội ngũ thợ xưởng sẽ theo xe
                            hỗ trợ bê vác và an vị vào đúng vị trí phong thủy theo yêu cầu của gia chủ.
                        </p>
                    </section>
                </main>

                <PolicySidebar class="sidebar-col" />
            </div>
        </div>
    </div>
    <AppFooter />
</template>

<script setup>
import PolicySidebar from '../components/PolicySidebar.vue'
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

.policy-page {
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

.policy-layout {
    display: grid;
    grid-template-columns: 1fr 300px;
    gap: 32px;
}

.policy-content {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    padding: 36px;
}

.policy-block {
    margin-bottom: 32px;
}

.block-title {
    font-size: 20px;
    color: #a32219;
    margin-bottom: 12px;
    font-weight: 700;
    border-bottom: 1px solid #f0e8df;
    padding-bottom: 8px;
}

.paragraph {
    font-size: 14px;
    color: #554438;
    line-height: 1.7;
}

/* Packaging Cards */
.packaging-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 16px;
    margin-top: 16px;
}

.pack-card {
    background: #fcfbfa;
    border: 1px solid #e8dfd5;
    padding: 16px;
    position: relative;
}

.step-num {
    background: #c59b27;
    color: #fff;
    font-size: 10px;
    font-weight: 800;
    padding: 2px 8px;
    border-radius: 4px;
    text-transform: uppercase;
}

.pack-card h4 {
    font-size: 14px;
    color: #2c1810;
    margin: 8px 0 4px;
    font-weight: 700;
}

.pack-card p {
    font-size: 12px;
    color: #665548;
    line-height: 1.4;
    margin: 0;
}

.shipping-fee-list {
    font-size: 14px;
    color: #554438;
    line-height: 1.8;
    padding-left: 20px;
}

.highlight-box {
    background: #faf4eb;
    border-left: 4px solid #a32219;
    padding: 14px 18px;
    font-size: 13px;
    color: #2c1810;
}

@media (max-width: 992px) {
    .policy-layout {
        grid-template-columns: 1fr;
    }

    .packaging-grid {
        grid-template-columns: 1fr;
    }
}
</style>