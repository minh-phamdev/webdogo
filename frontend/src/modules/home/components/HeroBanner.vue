<template>
    <section class="hero-container">
        <div class="hero">
            <img :src="image" alt="hero" class="hero-img" />
            <div class="hero-overlay"></div>

            <div class="hero-content">
                <span class="eyebrow">Thủ công · Gỗ tự nhiên 100%</span>
                <h1>{{ title }}</h1>
                <p>{{ subtitle }}</p>
                <button class="cta-btn">Mua ngay</button>
            </div>
        </div>
    </section>
</template>

<script setup>
defineProps({
    image: {
        type: String,
        default: 'https://media.loveitopcdn.com/25830/di-lac-xoai-50cm.jpg'
    },
    title: {
        type: String,
        default: 'Tượng gỗ phong thủy cao cấp'
    },
    subtitle: {
        type: String,
        default: 'Mang tài lộc - vượng khí - bình an'
    }
})
</script>

<style scoped>
.hero-container {
    width: 100%;
    max-width: 1320px;
    margin: 0 auto;
    padding: 16px 20px 0;
    box-sizing: border-box;
}

.hero {
    position: relative;
    height: 420px;
    border-radius: 16px;
    overflow: hidden;
}

.hero-img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    /* Banner dùng cover để phủ kín khung */
    object-position: center;
}

.hero-overlay {
    position: absolute;
    inset: 0;
    background: linear-gradient(90deg, rgba(43, 29, 18, 0.8) 0%, rgba(43, 29, 18, 0.4) 50%, rgba(43, 29, 18, 0) 80%);
}

.hero-content {
    position: absolute;
    top: 50%;
    left: 48px;
    transform: translateY(-50%);
    color: #fff;
    max-width: 480px;
}

.eyebrow {
    display: inline-block;
    font-size: 13px;
    letter-spacing: 1.5px;
    text-transform: uppercase;
    color: #e6ca65;
    font-weight: 600;
    margin-bottom: 12px;
}

.hero-content h1 {
    font-size: 36px;
    line-height: 1.2;
    margin: 0 0 12px;
    font-weight: 700;
}

.hero-content p {
    font-size: 15px;
    color: #efe6d5;
    margin: 0 0 24px;
}

.cta-btn {
    height: 42px;
    padding: 0 28px;
    font-weight: 600;
    color: #fff;
    background: #d4af37;
    border: none;
    border-radius: 8px;
    cursor: pointer;
    transition: background 0.2s;
}

.cta-btn:hover {
    background: #c59b27;
}

@media (max-width: 768px) {
    .hero {
        height: 320px;
    }

    .hero-content {
        left: 24px;
        right: 24px;
    }

    .hero-content h1 {
        font-size: 26px;
    }
}
</style>