<template>
    <AppHeader />
    <div class="policy-page">
        <div class="container-1320">
            <div class="page-header text-center">
                <span class="sub-title">QUY ĐỊNH CHUNG</span>
                <h1 class="serif main-title">Điều Khoản Sử Dụng Website</h1>
                <div class="gold-divider"></div>
            </div>

            <div class="policy-layout">
                <main class="policy-content bo-rounded shadow">
                    <section class="policy-block">
                        <h2 class="serif block-title">1. Bản quyền hình ảnh & Tác phẩm độc bản</h2>
                        <p class="paragraph">
                            Tất cả hình ảnh, video quay cận cảnh phôi gỗ và đường nét chạm khắc trên website
                            <strong>dogoanhkhoa.vn</strong> đều thuộc bản quyền sở hữu trí tuệ của Xưởng Đồ Gỗ Anh Khoa.
                            Nghiêm cấm mọi hành vi sao chép hình ảnh để giả mạo thương hiệu hoặc lừa đảo khách hàng.
                        </p>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">2. Quy định về giá cả & Kích thước gỗ</h2>
                        <p class="paragraph">
                            - Do đặc thù gỗ tự nhiên (đặc biệt là gỗ Nu, gỗ Chun Suốt), mỗi phôi gỗ sẽ có vân gỗ và kích
                            thước thực tế chênh lệch nhỏ (± 1 - 2 cm) so with thông số niêm yết nhưng vẫn đảm bảo chuẩn
                            cung số đẹp trên Thước Lỗ Ban.<br />
                            - Giá niêm yết áp dụng cho phôi gỗ tiêu chuẩn. Các yêu cầu đục sâu hơn hoặc dát vàng 24K sẽ
                            được báo giá bổ sung.
                        </p>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">3. Trách nhiệm của khách hàng</h2>
                        <p class="paragraph">
                            Khách hàng có trách nhiệm cung cấp chính xác địa chỉ nhận hàng, số điện thoại người nhận và
                            kiểm tra kỹ sản phẩm trước khi ký nhận biên bản bàn giao từ đội ngũ vận chuyển.
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

@media (max-width: 992px) {
    .policy-layout {
        grid-template-columns: 1fr;
    }
}
</style>