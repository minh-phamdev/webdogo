<template>
    <AppHeader />
    <div class="policy-page">
        <div class="container-1320">
            <!-- Header Trang -->
            <div class="page-header text-center">
                <span class="sub-title">CAM KẾT CHẤT LƯỢNG</span>
                <h1 class="serif main-title">Chính Sách Bảo Hành & Bảo Trì Đồ Gỗ</h1>
                <div class="gold-divider"></div>
            </div>

            <div class="policy-layout">
                <!-- Nội dung chính -->
                <main class="policy-content bo-rounded shadow">
                    <section class="policy-block">
                        <h2 class="serif block-title">1. Cam kết chất lượng phôi gỗ</h2>
                        <p class="paragraph">
                            Tất cả các sản phẩm tượng gỗ, đồ phong thủy và nội thất tại <strong>Đồ Gỗ Anh Khoa</strong>
                            đều được chế tác từ <strong>100% gỗ thật nguyên khối</strong>, chọn lọc phôi gỗ già, tôm gỗ
                            mịn và không pha tạp gỗ rác.
                        </p>
                        <div class="highlight-box bo-rounded">
                            <strong>✨ Đặc biệt:</strong> Khách hàng được quyền kiểm tra phôi mộc (chưa phun PU) trực
                            tiếp tại xưởng hoặc qua video call trước khi nghệ nhân hoàn thiện màu sơn.
                        </div>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">2. Thời hạn & Phạm vi bảo hành</h2>
                        <table class="policy-table bo-rounded">
                            <thead>
                                <tr>
                                    <th>Hạng mục</th>
                                    <th>Thời gian</th>
                                    <th>Nội dung bảo hành</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><strong>Chất liệu phôi gỗ</strong></td>
                                    <td><span class="badge-gold">5 Năm</span></td>
                                    <td>Bảo hành nứt nẻ xé gỗ lớn, cong vênh do lỗi sấy/ủ gỗ.</td>
                                </tr>
                                <tr>
                                    <td><strong>Mối mọt gỗ quý</strong></td>
                                    <td><span class="badge-red">Trọn Đời</span></td>
                                    <td>Thay thế mới hoặc xử lý triệt để nếu gỗ xuất hiện mối mọt.</td>
                                </tr>
                                <tr>
                                    <td><strong>Nước sơn PU / Dầu lau</strong></td>
                                    <td><span>2 Năm</span></td>
                                    <td>Hỗ trợ phun lại màu PU hoặc dặm bóng nếu bong tróc tự nhiên.</td>
                                </tr>
                            </tbody>
                        </table>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">3. Quy trình tiếp nhận bảo hành</h2>
                        <ol class="step-list">
                            <li><strong>Bước 1:</strong> Khách hàng chụp ảnh/video vị trí gỗ cần xử lý gửi qua Zalo
                                Hotline <strong>0901 234 567</strong>.</li>
                            <li><strong>Bước 2:</strong> Kỹ thuật viên xưởng đánh giá trong vòng 2 giờ làm việc.</li>
                            <li><strong>Bước 3:</strong> Thợ đến tận nhà xử lý (đối với nội thất/tượng lớn) hoặc tiếp
                                nhận về xưởng bảo trì miễn phí.</li>
                        </ol>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">4. Điều kiện không thuộc phạm vi bảo hành</h2>
                        <ul class="check-list">
                            <li>❌ Sản phẩm bị hư hỏng do rơi vỡ, va đập mạnh từ tác động bên ngoài.</li>
                            <li>❌ Để đồ gỗ ngoài trời nắng gắt hoặc ngâm trong nước thời gian dài.</li>
                            <li>❌ Tự ý dùng chất tẩy rửa hóa chất mạnh lau lên bề mặt sơn PU.</li>
                        </ul>
                    </section>
                </main>

                <!-- Sidebar -->
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

.policy-block:last-child {
    margin-bottom: 0;
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
    margin-bottom: 12px;
}

.highlight-box {
    background: #faf4eb;
    border-left: 4px solid #c59b27;
    padding: 14px 18px;
    font-size: 13px;
    color: #2c1810;
}

/* Table */
.policy-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 12px;
    overflow: hidden;
    border: 1px solid #e8dfd5;
}

.policy-table th,
.policy-table td {
    padding: 12px 16px;
    font-size: 13px;
    text-align: left;
    border-bottom: 1px solid #e8dfd5;
}

.policy-table th {
    background: #2c1810;
    color: #e6c675;
    font-weight: 700;
}

.badge-gold {
    background: #c59b27;
    color: #fff;
    padding: 3px 8px;
    border-radius: 4px;
    font-weight: 700;
    font-size: 11px;
}

.badge-red {
    background: #a32219;
    color: #fff;
    padding: 3px 8px;
    border-radius: 4px;
    font-weight: 700;
    font-size: 11px;
}

.step-list,
.check-list {
    font-size: 14px;
    color: #554438;
    line-height: 1.8;
    padding-left: 20px;
}

@media (max-width: 992px) {
    .policy-layout {
        grid-template-columns: 1fr;
    }
}
</style>