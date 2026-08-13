<template>
    <AppHeader />
    <div class="support-page">
        <div class="container-1320">
            <div class="page-header text-center">
                <span class="sub-title">GIẢI ĐÁP THẮC MẮC</span>
                <h1 class="serif main-title">Câu Hỏi Thường Gặp (FAQ)</h1>
                <div class="gold-divider"></div>
            </div>

            <div class="support-layout">
                <main class="faq-content">
                    <div class="faq-list">
                        <div v-for="(faq, index) in faqs" :key="index" class="faq-item bo-rounded shadow"
                            :class="{ active: openIndex === index }">
                            <button class="faq-question" @click="toggleFaq(index)">
                                <span class="q-icon">Q{{ index + 1 }}</span>
                                <span class="q-text">{{ faq.question }}</span>
                                <span class="arrow-icon">{{ openIndex === index ? '−' : '+' }}</span>
                            </button>

                            <div v-show="openIndex === index" class="faq-answer">
                                <p>{{ faq.answer }}</p>
                            </div>
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
import { ref } from 'vue'
import SupportSidebar from '../components/SupportSidebar.vue'
import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

const openIndex = ref(0) // Mặc định mở câu đầu tiên

const toggleFaq = (index) => {
    openIndex.value = openIndex.value === index ? null : index
}

const faqs = ref([
    {
        question: 'Làm sao để kiểm tra đúng chuẩn 100% gỗ thật nguyên khối?',
        answer: 'Tại Đồ Gỗ Anh Khoa, trước khi phun PU màu hoàn thiện, chúng tôi luôn mời gia chủ kiểm tra phôi mộc trực tiếp tại xưởng hoặc qua Video Call quay cận cảnh từng tôm gỗ, gầm tượng. Phôi gỗ thật có vân tự nhiên liền mạch, không có vết dán keo ép.'
    },
    {
        question: 'Xưởng có nhận đục tượng & nội thất theo kích thước Thước Lỗ Ban riêng không?',
        answer: 'Có. Chúng tôi chuyên chế tác các tác phẩm độc bản theo kích thước cung Tiến Bảo, Tài Lộc chuẩn Thước Lỗ Ban 38.8cm (âm phần/bàn thờ) và 52.2cm (thông thủy/cửa phòng) phù hợp chính xác với không gian của từng gia chủ.'
    },
    {
        question: 'Đặt hàng đục theo yêu cầu thì đặt cọc bao nhiêu %?',
        answer: 'Đơn hàng đặt chế tác riêng gia chủ chỉ cần đặt cọc trước 20% - 30% giá trị đơn hàng. Sau khi xưởng đục xong phôi mộc gửi gia chủ duyệt ưng ý rồi mới tiến hành làm màu PU và thu nốt tiền khi giao hàng tận nhà.'
    },
    {
        question: 'Vận chuyển tượng xa có lo bị gãy các chi tiết ngón tay, cành hoa không?',
        answer: 'Gia chủ hoàn toàn yên tâm. Mọi sản phẩm đều được bọc xốp bóng khí 3 lớp, đóng thùng gỗ Pallet thưa chịu lực gia cố bên ngoài. Khi nhận hàng quý khách được bóc thùng kiểm tra toàn bộ chi tiết mới thanh toán.'
    },
    {
        question: 'Tượng gỗ để lâu năm có bị nứt nẻ hay mất màu PU không?',
        answer: 'Xưởng sử dụng công nghệ sấy & ủ phôi gỗ đạt độ ẩm chuẩn dưới 12% trước khi đục, cùng với sơn PU 6 lớp cao cấp của Đức chống bay màu. Xưởng có chính sách bảo hành nứt nẻ 5 năm và mối mọt trọn đời.'
    }
])
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

.faq-list {
    display: flex;
    flex-direction: column;
    gap: 16px;
}

.faq-item {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    overflow: hidden;
    transition: border-color 0.2s;
}

.faq-item.active {
    border-color: #c59b27;
}

.faq-question {
    width: 100%;
    display: flex;
    align-items: center;
    gap: 14px;
    padding: 18px 20px;
    background: none;
    border: none;
    text-align: left;
    cursor: pointer;
}

.q-icon {
    background: #f2eae0;
    color: #a32219;
    font-weight: 800;
    font-size: 13px;
    padding: 4px 10px;
    border-radius: 6px;
}

.q-text {
    flex: 1;
    font-size: 15px;
    font-weight: 700;
    color: #2c1810;
    line-height: 1.4;
}

.arrow-icon {
    font-size: 20px;
    color: #c59b27;
    font-weight: 700;
}

.faq-answer {
    padding: 0 20px 20px 64px;
    font-size: 14px;
    color: #554438;
    line-height: 1.7;
    border-top: 1px dashed #f0e8df;
    margin-top: -4px;
    padding-top: 14px;
}

@media (max-width: 992px) {
    .support-layout {
        grid-template-columns: 1fr;
    }

    .faq-answer {
        padding-left: 20px;
    }
}
</style>