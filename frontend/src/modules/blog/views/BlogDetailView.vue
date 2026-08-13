<template>
    <div class="blog-detail-page">
        <AppHeader />

        <!-- 1. Breadcrumb & Header Bài Viết -->
        <header class="article-header">
            <div class="container-1000">
                <div class="breadcrumb">
                    <router-link to="/">Trang chủ</router-link> /
                    <router-link to="/blog">Blog kiến thức</router-link> /
                    <span>{{ article.categoryName }}</span>
                </div>

                <span class="category-badge">{{ article.categoryName }}</span>
                <h1 class="article-title serif">{{ article.title }}</h1>

                <div class="article-meta">
                    <div class="author-info">
                        <img :src="article.authorAvatar" :alt="article.author" class="author-avatar" />
                        <div>
                            <span class="author-name">{{ article.author }}</span>
                            <span class="author-role">{{ article.authorRole }}</span>
                        </div>
                    </div>
                    <div class="meta-right">
                        <span>📅 {{ article.date }}</span>
                        <span>⏱️ {{ article.readTime }} phút đọc</span>
                        <span>👁️ {{ article.views }} lượt xem</span>
                    </div>
                </div>
            </div>
        </header>

        <!-- 2. Nội dung chính bài viết -->
        <main class="page-content">
            <div class="container-1000">
                <!-- Ảnh Banner Bài Viết -->
                <div class="featured-image-wrapper bo-rounded">
                    <img :src="article.image" :alt="article.title" class="featured-image" />
                </div>

                <div class="article-layout">
                    <!-- Mục lục bài viết (Table of Contents - Tốt cho SEO) -->
                    <div class="toc-box bo-rounded">
                        <div class="toc-title serif">📌 Mục lục bài viết</div>
                        <ul>
                            <li v-for="(item, index) in article.toc" :key="index">
                                <a :href="`#section-${index + 1}`">{{ index + 1 }}. {{ item }}</a>
                            </li>
                        </ul>
                    </div>

                    <!-- Đoạn mở đầu (Lead Paragraph) -->
                    <p class="lead-text">{{ article.excerpt }}</p>

                    <!-- Nội dung chi tiết bài viết -->
                    <div class="article-body">
                        <!-- Phần 1 -->
                        <h2 id="section-1" class="serif section-heading">1. Ý nghĩa phong thủy của Tượng Di Lặc trong
                            không gian sống</h2>
                        <p>
                            Trong phong thủy dân gian, <strong>Phật Di Lặc</strong> (hay còn gọi là Bố Đại Hòa Thượng)
                            là biểu tượng tuyệt đối của sự may mắn, hỉ lạc và tài lộc. Khác với các vị Phật uy nghiêm
                            khác, tượng Di Lặc luôn mang nụ cười hoan hỷ, bụng phệ phô phang, đại diện cho tâm thái tự
                            tại, buông bỏ muộn phiền.
                        </p>

                        <blockquote class="gold-blockquote">
                            <p>"Bên cạnh giá trị tâm linh, một bức tượng Di Lặc được đục từ chất gỗ quý nguyên khối còn
                                là điểm nhấn đẳng cấp, thể hiện gu thẩm mỹ tinh tế của gia chủ."</p>
                            <cite>— Nghệ nhân Nguyễn Văn Tâm (Xưởng Đồ Gỗ Anh Khoa)</cite>
                        </blockquote>

                        <!-- Phần 2 -->
                        <h2 id="section-2" class="serif section-heading">2. Cách chọn chất liệu gỗ hợp Mệnh và Ngũ Hành
                        </h2>
                        <p>
                            Việc lựa chọn chất liệu gỗ không chỉ dựa vào sở thích hay ngân sách, mà còn phải cân đối
                            theo Ngũ Hành để tương sinh với bản mệnh của gia chủ:
                        </p>

                        <ul class="styled-list">
                            <li><strong>Mệnh Kim:</strong> Nên chọn gỗ Hương hoặc gỗ Nu Hoàng Đàn có tông màu vàng sẫm
                                hoặc nâu đất (Thổ sinh Kim).</li>
                            <li><strong>Mệnh Mộc & Thủy:</strong> Phù hợp nhất với các loại gỗ có tông màu sẫm đen như
                                Gỗ Mun Hoa, Gỗ Mun Sừng.</li>
                            <li><strong>Mệnh Hỏa & Thổ:</strong> Tượng đục từ Gỗ Cẩm Lai, Gỗ Bách Xanh mang sắc đỏ tía
                                hoặc vân gỗ rực rỡ.</li>
                        </ul>

                        <!-- 🛍️ Widget Gợi ý sản phẩm liên quan ngay trong bài (Tăng chuyển đổi) -->
                        <div class="inline-product-cta bo-rounded" v-if="article.relatedProduct">
                            <div class="product-cta-img">
                                <img :src="article.relatedProduct.image" :alt="article.relatedProduct.name" />
                            </div>
                            <div class="product-cta-info">
                                <span class="cta-label">✨ TÁC PHẨM ĐỰC TAY NỔI BẬT TRONG BÀI</span>
                                <h4 class="serif product-title">{{ article.relatedProduct.name }}</h4>
                                <p class="product-desc">{{ article.relatedProduct.specs }}</p>
                                <div class="product-cta-price">
                                    <span class="price">{{ formatPrice(article.relatedProduct.price) }}</span>
                                    <router-link :to="`/product/${article.relatedProduct.id}`" class="btn-view-product">
                                        Xem chi tiết tác phẩm →
                                    </router-link>
                                </div>
                            </div>
                        </div>

                        <!-- Phần 3 -->
                        <h2 id="section-3" class="serif section-heading">3. Vị trí "Đắc Địa" đặt tượng Di Lặc để chiêu
                            tài đón lộc</h2>
                        <p>
                            Vị trí đặt tượng quyết định đến 70% hiệu quả phong thủy. Dưới đây là 3 vị trí vàng được các
                            chuyên gia khuyến nghị:
                        </p>
                        <p>
                            1. <strong>Tầm mắt đối diện cửa chính:</strong> Đặt tượng ở độ cao khoảng 1m hướng ra cửa
                            chính giúp xua đuổi tà khí, biến năng lượng xấu thành năng lượng an lành.<br />
                            2. <strong>Bàn làm việc hoặc Kệ tivi phòng khách:</strong> Giúp gia chủ minh mẫn, giảm căng
                            thẳng trong công việc và duy trì sự hòa thuận trong gia đình.
                        </p>
                    </div>

                    <!-- 3. Thanh chia sẻ & Thẻ Tag -->
                    <div class="article-footer-tools">
                        <div class="tags-list">
                            <span class="tag-label">Tags:</span>
                            <span class="tag-item">#TuongDiLac</span>
                            <span class="tag-item">#PhongThuyPhongKhach</span>
                            <span class="tag-item">#GoHuongGiaLai</span>
                        </div>

                        <div class="share-buttons">
                            <span class="share-label">Chia sẻ bài viết:</span>
                            <button @click="shareArticle('facebook')" class="btn-share fb">Facebook</button>
                            <button @click="shareArticle('zalo')" class="btn-share zalo">Zalo</button>
                            <button @click="copyLink" class="btn-share copy">📋
                                {{ copied ? 'Đã sao chép!' : 'Copy Link' }}</button>
                        </div>
                    </div>
                </div>

                <!-- 4. Khối Đăng ký nhận bản tin phong thủy -->
                <section class="newsletter-box bo-rounded">
                    <div class="newsletter-content text-center">
                        <h3 class="serif newsletter-title">Nhận Tư Vấn Phong Thủy Từ Nghệ Nhân</h3>
                        <p class="newsletter-desc">Đăng ký để nhận các bài viết phân tích phong thủy đồ gỗ và thước Lỗ
                            Ban mới nhất từ Đồ Gỗ Anh Khoa.</p>
                        <form @submit.prevent="handleSubscribe" class="newsletter-form">
                            <input type="email" v-model="emailInput"
                                placeholder="Nhập địa chỉ email hoặc SĐT của bạn..." required />
                            <button type="submit" class="btn-gold">Đăng Ký Nhận Tin</button>
                        </form>
                    </div>
                </section>

                <!-- 5. Danh sách Bài viết liên quan -->
                <section class="related-posts-section">
                    <div class="section-head text-center">
                        <span class="sub-title">BÀI VIẾT CÙNG CHỦ ĐỀ</span>
                        <h2 class="serif section-title">Có Thể Bạn Quan Tâm</h2>
                        <div class="gold-divider"></div>
                    </div>

                    <div class="related-grid">
                        <article v-for="item in relatedPosts" :key="item.id" class="related-card bo-rounded">
                            <div class="card-img">
                                <img :src="item.image" :alt="item.title" />
                            </div>
                            <div class="card-body">
                                <span class="post-date">{{ item.date }}</span>
                                <h4 class="post-title serif">
                                    <router-link :to="`/blog/${item.id}`">{{ item.title }}</router-link>
                                </h4>
                            </div>
                        </article>
                    </div>
                </section>
            </div>
        </main>

        <AppFooter />
    </div>
</template>

<script setup>
import { ref, computed, onMounted, watch } from 'vue'
import { useRoute } from 'vue-router'

import AppHeader from '@/shared/components/layout/AppHeader.vue'
import AppFooter from '@/shared/components/layout/AppFooter.vue'

const route = useRoute()
const copied = ref(false)
const emailInput = ref('')

// Giả lập dữ liệu bài viết theo ID
const article = ref({
    id: route.params.id || 101,
    title: 'Hướng Dẫn Chọn Tượng Di Lặc Hợp Mệnh Mang Lại Tài Lộc Năm 2026',
    categoryName: 'Phong Thủy Đặt Tượng',
    excerpt: 'Tượng Di Lặc là biểu tượng của sự hỉ lạc và may mắn. Tuy nhiên, việc chọn đúng chất liệu gỗ và vị trí đặt tượng chuẩn phong thủy sẽ giúp kích hoạt tối đa năng lượng tài lộc cho gia chủ.',
    author: 'Nghệ nhân Nguyễn Văn Tâm',
    authorRole: 'Cố vấn Chế tác Phong thủy',
    authorAvatar: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=150&auto=format&fit=crop&q=80',
    date: '10/08/2026',
    readTime: 6,
    views: 1240,
    image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=1200&auto=format&fit=crop&q=80',
    toc: [
        'Ý nghĩa phong thủy của Tượng Di Lặc trong không gian sống',
        'Cách chọn chất liệu gỗ hợp Mệnh và Ngũ Hành',
        'Vị trí "Đắc Địa" đặt tượng Di Lặc để chiêu tài đón lộc'
    ],
    relatedProduct: {
        id: 'SP-102',
        name: 'Tượng Di Lặc Ngũ Phúc Gỗ Hương Gia Lai Nguyên Khối',
        specs: 'Kích thước chuẩn Lỗ Ban: Cao 81cm x Ngang 68cm x Sâu 42cm',
        price: 18500000,
        image: 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=500&auto=format&fit=crop&q=80'
    }
})

// Dữ liệu bài viết liên quan
const relatedPosts = ref([
    {
        id: 1,
        title: 'Cách Phân Biệt Gỗ Hương Gia Lai Và Gỗ Hương Nam Phi Chuẩn 100%',
        date: '05/08/2026',
        image: 'https://images.unsplash.com/photo-1544816155-12df9643f363?w=500&auto=format&fit=crop&q=80'
    },
    {
        id: 2,
        title: 'Tra Kích Thước Lỗ Ban Đặt Tượng Chuẩn Cung Cát Tài Lộc',
        date: '02/08/2026',
        image: 'https://images.unsplash.com/photo-1507003211169-0a1dd7228f2d?w=500&auto=format&fit=crop&q=80'
    },
    {
        id: 3,
        title: 'Bí Quyết Bảo Quản Tượng Gỗ Nguyên Khối Không Bị Nứt Nẻ Mùa Khô',
        date: '28/07/2026',
        image: 'https://images.unsplash.com/photo-1618221195710-dd6b41faaea6?w=500&auto=format&fit=crop&q=80'
    }
])

const formatPrice = (value) => {
    return new Intl.NumberFormat('vi-VN', { style: 'currency', currency: 'VND' }).format(value)
}

const copyLink = () => {
    navigator.clipboard.writeText(window.location.href)
    copied.value = true
    setTimeout(() => { copied.value = false }, 2500)
}

const shareArticle = (platform) => {
    const url = encodeURIComponent(window.location.href)
    if (platform === 'facebook') {
        window.open(`https://www.facebook.com/sharer/sharer.php?u=${url}`, '_blank')
    } else if (platform === 'zalo') {
        window.open(`https://chat.zalo.me/`, '_blank')
    }
}

const handleSubscribe = () => {
    alert(`Cảm ơn bạn đã đăng ký! Thông tin tư vấn sẽ gửi tới: ${emailInput.value}`)
    emailInput.value = ''
}

// Cập nhật lại tiêu đề trang động khi chuyển bài viết
onMounted(() => {
    document.title = `${article.value.title} - Đồ Gỗ Anh Khoa`
})
</script>

<style scoped>
.blog-detail-page {
    background: #faf8f5;
    color: #2c1810;
}

.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.text-center {
    text-align: center;
}

.bo-rounded {
    border-radius: 12px;
}

.container-1000 {
    max-width: 1000px;
    margin: 0 auto;
    padding: 0 20px;
}

.page-content {
    padding: 30px 0 60px;
}

/* 1. Header Bài viết */
.article-header {
    padding: 40px 0 20px;
    background: #faf8f5;
}

.breadcrumb {
    font-size: 13px;
    color: #8c7a6b;
    margin-bottom: 12px;
}

.breadcrumb a {
    color: #8c7a6b;
    text-decoration: none;
}

.breadcrumb a:hover {
    color: #c59b27;
}

.category-badge {
    display: inline-block;
    background: rgba(197, 155, 39, 0.15);
    color: #c59b27;
    font-size: 11px;
    font-weight: 700;
    padding: 4px 10px;
    border-radius: 4px;
    text-transform: uppercase;
    margin-bottom: 10px;
    border: 1px solid rgba(197, 155, 39, 0.3);
}

.article-title {
    font-size: 32px;
    color: #2c1810;
    margin: 0 0 20px;
    line-height: 1.35;
    font-weight: 700;
}

.article-meta {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding-top: 16px;
    border-top: 1px solid #e8dfd5;
    font-size: 13px;
    color: #66554a;
}

.author-info {
    display: flex;
    align-items: center;
    gap: 12px;
}

.author-avatar {
    width: 44px;
    height: 44px;
    border-radius: 50%;
    object-fit: cover;
    border: 2px solid #c59b27;
}

.author-name {
    font-weight: 700;
    color: #2c1810;
    display: block;
}

.author-role {
    font-size: 11px;
    color: #8c7a6b;
}

.meta-right {
    display: flex;
    gap: 16px;
}

/* 2. Ảnh Banner & Layout Nội dung */
.featured-image-wrapper {
    width: 100%;
    height: 420px;
    overflow: hidden;
    margin-bottom: 30px;
}

.featured-image {
    width: 100%;
    height: 100%;
    object-fit: cover;
}

.lead-text {
    font-size: 17px;
    line-height: 1.7;
    color: #3d2a20;
    font-weight: 500;
    margin-bottom: 24px;
}

.toc-box {
    background: #f2eae0;
    border: 1px solid #e8dfd5;
    padding: 20px 24px;
    margin-bottom: 30px;
}

.toc-title {
    font-size: 16px;
    font-weight: 700;
    color: #2c1810;
    margin-bottom: 10px;
}

.toc-box ul {
    margin: 0;
    padding-left: 20px;
}

.toc-box li {
    margin-bottom: 6px;
    font-size: 14px;
}

.toc-box a {
    color: #554438;
    text-decoration: none;
    transition: color 0.2s;
}

.toc-box a:hover {
    color: #a32219;
    font-weight: 600;
}

.article-body {
    font-size: 15px;
    line-height: 1.8;
    color: #3d2a20;
}

.section-heading {
    font-size: 22px;
    color: #2c1810;
    margin: 32px 0 14px;
    font-weight: 700;
}

.gold-blockquote {
    border-left: 4px solid #c59b27;
    background: #ffffff;
    padding: 18px 24px;
    margin: 24px 0;
    border-radius: 0 8px 8px 0;
    box-shadow: 0 2px 10px rgba(0, 0, 0, 0.02);
}

.gold-blockquote p {
    font-style: italic;
    font-size: 16px;
    color: #2c1810;
    margin: 0 0 8px;
}

.gold-blockquote cite {
    font-size: 12px;
    font-weight: 700;
    color: #a32219;
    font-style: normal;
}

.styled-list {
    padding-left: 20px;
    margin-bottom: 24px;
}

.styled-list li {
    margin-bottom: 8px;
}

/* Product CTA Widget */
.inline-product-cta {
    display: grid;
    grid-template-columns: 220px 1fr;
    gap: 20px;
    background: #ffffff;
    border: 1px solid #c59b27;
    padding: 18px;
    margin: 30px 0;
    box-shadow: 0 4px 15px rgba(197, 155, 39, 0.12);
}

.product-cta-img img {
    width: 100%;
    height: 160px;
    object-fit: cover;
    border-radius: 8px;
}

.cta-label {
    font-size: 10px;
    font-weight: 800;
    color: #a32219;
    letter-spacing: 1px;
    display: block;
    margin-bottom: 4px;
}

.product-title {
    font-size: 18px;
    color: #2c1810;
    margin: 0 0 6px;
    font-weight: 700;
}

.product-desc {
    font-size: 12px;
    color: #7a685b;
    margin-bottom: 12px;
}

.product-cta-price {
    display: flex;
    justify-content: space-between;
    align-items: center;
}

.product-cta-price .price {
    font-size: 18px;
    font-weight: 800;
    color: #a32219;
}

.btn-view-product {
    background: #2c1810;
    color: #e6c675;
    text-decoration: none;
    padding: 8px 14px;
    border-radius: 6px;
    font-size: 12px;
    font-weight: 700;
    transition: background 0.2s;
}

.btn-view-product:hover {
    background: #c59b27;
    color: #fff;
}

/* 3. Footer Tools & Tags */
.article-footer-tools {
    display: flex;
    justify-content: space-between;
    align-items: center;
    padding: 20px 0;
    border-top: 1px solid #e8dfd5;
    border-bottom: 1px solid #e8dfd5;
    margin-top: 40px;
}

.tag-label,
.share-label {
    font-size: 12px;
    font-weight: 700;
    color: #8c7a6b;
    margin-right: 8px;
}

.tag-item {
    font-size: 12px;
    color: #2c1810;
    background: #f2eae0;
    padding: 4px 10px;
    border-radius: 4px;
    margin-right: 6px;
}

.share-buttons {
    display: flex;
    align-items: center;
    gap: 8px;
}

.btn-share {
    border: none;
    padding: 6px 12px;
    border-radius: 4px;
    font-size: 12px;
    font-weight: 700;
    cursor: pointer;
}

.btn-share.fb {
    background: #1877f2;
    color: #fff;
}

.btn-share.zalo {
    background: #0068ff;
    color: #fff;
}

.btn-share.copy {
    background: #e8dfd5;
    color: #2c1810;
}

/* 4. Newsletter Box */
.newsletter-box {
    background: #2c1810;
    color: #ffffff;
    padding: 36px 20px;
    margin: 40px 0;
}

.newsletter-title {
    font-size: 22px;
    color: #e6c675;
    margin: 0 0 8px;
}

.newsletter-desc {
    font-size: 13px;
    color: #d4c5b9;
    max-width: 600px;
    margin: 0 auto 20px;
}

.newsletter-form {
    display: flex;
    max-width: 500px;
    margin: 0 auto;
    gap: 10px;
}

.newsletter-form input {
    flex: 1;
    padding: 10px 14px;
    border: 1px solid #554438;
    border-radius: 6px;
    background: #faf8f5;
    color: #2c1810;
    font-size: 13px;
    outline: none;
}

.btn-gold {
    background: #c59b27;
    color: #fff;
    border: none;
    padding: 10px 20px;
    border-radius: 6px;
    font-weight: 700;
    cursor: pointer;
}

.btn-gold:hover {
    background: #e6c675;
    color: #2c1810;
}

/* 5. Related Posts */
.related-posts-section {
    margin-top: 50px;
}

.sub-title {
    font-size: 11px;
    letter-spacing: 1.5px;
    color: #c59b27;
    font-weight: 700;
    display: block;
}

.section-title {
    font-size: 22px;
    color: #2c1810;
    margin: 4px 0 0;
}

.gold-divider {
    width: 50px;
    height: 3px;
    background: #c59b27;
    margin: 10px auto 30px;
    border-radius: 2px;
}

.related-grid {
    display: grid;
    grid-template-columns: repeat(3, 1fr);
    gap: 20px;
}

.related-card {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    overflow: hidden;
}

.related-card .card-img img {
    width: 100%;
    height: 150px;
    object-fit: cover;
}

.related-card .card-body {
    padding: 14px;
}

.related-card .post-date {
    font-size: 11px;
    color: #8c7a6b;
    display: block;
    margin-bottom: 4px;
}

.related-card .post-title {
    font-size: 14px;
    margin: 0;
    line-height: 1.4;
    height: 38px;
    overflow: hidden;
    display: -webkit-box;
    -webkit-line-clamp: 2;
    -webkit-box-orient: vertical;
}

.related-card .post-title a {
    color: #2c1810;
    text-decoration: none;
}

.related-card .post-title a:hover {
    color: #c59b27;
}

@media (max-width: 768px) {
    .article-title {
        font-size: 24px;
    }

    .article-meta {
        flex-direction: column;
        align-items: flex-start;
        gap: 10px;
    }

    .featured-image-wrapper {
        height: 250px;
    }

    .inline-product-cta {
        grid-template-columns: 1fr;
    }

    .article-footer-tools {
        flex-direction: column;
        gap: 16px;
        align-items: flex-start;
    }

    .newsletter-form {
        flex-direction: column;
    }

    .related-grid {
        grid-template-columns: 1fr;
    }
}
</style>