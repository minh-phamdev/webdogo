<template>
    <AppHeader />
    <div class="policy-page">
        <div class="container-1320">
            <div class="page-header text-center">
                <span class="sub-title">MINH BẠCH & UY TÍN</span>
                <h1 class="serif main-title">Chính Sách Đổi Trả & Hoàn Tiền</h1>
                <div class="gold-divider"></div>
            </div>

            <div class="policy-layout">
                <main class="policy-content bo-rounded shadow">
                    <section class="policy-block">
                        <h2 class="serif block-title">1. Điều kiện áp dụng đổi trả (Trong 7 ngày)</h2>
                        <p class="paragraph">
                            Gia chủ được quyền đổi sang tác phẩm tượng/đồ gỗ khác hoặc hoàn tiền 100% nếu gặp các trường
                            hợp sau:
                        </p>
                        <ul class="return-rules">
                            <li>✅ Sản phẩm bị nứt gãy, sứt mẻ trong quá trình vận chuyển.</li>
                            <li>✅ Giao không đúng chủng loại gỗ, sai kích thước Thước Lỗ Ban đã đặt.</li>
                            <li>✅ Tượng có lỗi chế tác diện mặt không đúng theo ảnh/video xưởng đã gửi duyệt.</li>
                        </ul>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">2. Quy định với sản phẩm Đặt Hàng Theo Yêu Cầu</h2>
                        <p class="paragraph">
                            Đối với các đơn hàng đục tượng độc bản, kích thước riêng theo phong thủy của gia chủ:
                        </p>
                        <div class="highlight-box bo-rounded">
                            ⚠️ Xưởng hỗ trợ chỉnh sửa đường nét đục tay đến khi gia chủ thực sự hài lòng trước khi hoàn
                            thiện sơn PU. <strong>Không áp dụng trả hàng hoàn tiền</strong> vì lý do thay đổi sở thích
                            cá nhân sau khi xưởng đã hoàn thiện.
                        </div>
                    </section>

                    <section class="policy-block">
                        <h2 class="serif block-title">3. Phương thức & Chi phí đổi trả</h2>
                        <p class="paragraph">
                            - <strong>Lỗi từ nhà sản xuất / vận chuyển:</strong> Xưởng chịu 100% cước phí vận chuyển đổi
                            trả 2 chiều.<br />
                            - <strong>Đổi mẫu theo nhu cầu khách:</strong> Khách hàng vui lòng chịu cước phí vận chuyển
                            phát sinh.
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

.return-rules {
    font-size: 14px;
    color: #554438;
    line-height: 1.8;
    list-style: none;
    padding: 0;
}

.return-rules li {
    margin-bottom: 8px;
}

.highlight-box {
    background: #faf4eb;
    border-left: 4px solid #c59b27;
    padding: 14px 18px;
    font-size: 13px;
    color: #2c1810;
    line-height: 1.6;
}

@media (max-width: 992px) {
    .policy-layout {
        grid-template-columns: 1fr;
    }
}
</style>