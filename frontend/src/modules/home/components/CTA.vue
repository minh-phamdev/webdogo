<template>
    <section class="cta">
        <div class="cta-box">
            <div class="content">
                <span class="eyebrow">500+ khách hàng đã lựa chọn</span>
                <h2>Khám phá bộ sưu tập tượng gỗ phong thủy</h2>
                <p>Hơn 500+ sản phẩm thủ công, chọn lọc từ gỗ quý.</p>

                <div class="actions">
                    <button class="primary" @click="goShop">Xem tất cả sản phẩm</button>
                    <button class="secondary" @click="goBestSeller">Xem bán chạy</button>
                </div>
            </div>

            <div class="image">
                <img
                    src="https://png.pngtree.com/thumb_back/fh260/background/20250224/pngtree-a-small-buddha-statue-sits-on-top-of-smooth-black-rocks-image_16948733.jpg" />
            </div>
        </div>
    </section>
</template>

<script setup>
import { useRouter } from 'vue-router'

const router = useRouter()

const goShop = () => {
    router.push('/products')
}

const goBestSeller = () => {
    router.push('/products?sort=best')
}
</script>

<style scoped>
.cta {
    padding: 80px 100px;
    background: var(--wd-surface);
    font-family: var(--font-body);
}

.cta-box {
    display: flex;
    align-items: center;
    justify-content: space-between;
    background: var(--wd-bg);
    border: 1px solid var(--wd-line);
    border-radius: 16px;
    padding: 40px 50px;
}

.content {
    max-width: 500px;
}

.eyebrow {
    display: inline-block;
    font-size: 12.5px;
    font-weight: 700;
    letter-spacing: .5px;
    color: var(--wd-gold-600);
    margin-bottom: 8px;
}

.content h2 {
    font-family: var(--font-display);
    font-size: 26px;
    font-weight: 700;
    margin-bottom: 12px;
    color: var(--wd-wood-900);
}

.content p {
    font-size: 15px;
    color: var(--wd-ink-soft);
    margin-bottom: 20px;
}

.actions {
    display: flex;
    gap: 12px;
}

.primary {
    background: var(--wd-accent);
    color: #fff;
    border: none;
    padding: 12px 22px;
    border-radius: 6px;
    font-weight: 600;
    cursor: pointer;
    transition: opacity .2s ease;
}

.primary:hover {
    opacity: .9;
}

.secondary {
    background: #fff;
    border: 1px solid var(--wd-line);
    color: var(--wd-ink);
    padding: 12px 22px;
    border-radius: 6px;
    cursor: pointer;
    transition: border-color .2s ease;
}

.secondary:hover {
    border-color: var(--wd-gold-600);
}

.image img {
    width: 320px;
    border-radius: 12px;
    object-fit: cover;
    box-shadow: var(--wd-shadow-md);
}

@media (max-width: 900px) {
    .cta-box {
        flex-direction: column;
        gap: 20px;
    }

    .image img {
        width: 100%;
    }
}
</style>