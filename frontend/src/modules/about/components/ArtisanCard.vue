<template>
    <div class="artisan-card bo-rounded">
        <div class="artisan-img">
            <img :src="artisan.avatar" :alt="artisan.name" />
            <span class="exp-tag">{{ artisan.experience }} năm kinh nghiệm</span>
        </div>
        <div class="artisan-info">
            <h3 class="name serif">{{ artisan.name }}</h3>
            <p class="specialty">Chuyên môn: {{ artisan.specialty }}</p>
            <p class="bio">{{ artisan.bio }}</p>
        </div>
    </div>
</template>

<script setup>
defineProps({
    artisan: { type: Object, required: true }
})
</script>

<style scoped>
.serif {
    font-family: 'Playfair Display', Georgia, serif;
}

.bo-rounded {
    border-radius: 12px;
}

.artisan-card {
    background: #ffffff;
    border: 1px solid #e8dfd5;
    overflow: hidden;
    transition: all 0.3s ease;
    box-shadow: 0 4px 15px rgba(44, 24, 16, 0.03);
}

.artisan-card:hover {
    transform: translateY(-5px);
    border-color: #c59b27;
    box-shadow: 0 10px 20px rgba(44, 24, 16, 0.08);
}

.artisan-img {
    position: relative;
    height: 260px;
    overflow: hidden;
}

.artisan-img img {
    width: 100%;
    height: 100%;
    object-fit: cover;
    transition: transform 0.4s;
}

.artisan-card:hover .artisan-img img {
    transform: scale(1.04);
}

.exp-tag {
    position: absolute;
    bottom: 12px;
    left: 12px;
    background: rgba(44, 24, 16, 0.9);
    color: #e6c675;
    padding: 4px 10px;
    border-radius: 4px;
    font-size: 11px;
    font-weight: 600;
    border: 1px solid rgba(230, 198, 117, 0.3);
}

.artisan-info {
    padding: 20px;
}

.name {
    font-size: 18px;
    color: #2c1810;
    margin: 0 0 6px 0;
    font-weight: 700;
}

.specialty {
    font-size: 13px;
    color: #a32219;
    font-weight: 600;
    margin-bottom: 10px;
}

.bio {
    font-size: 13px;
    color: #66554a;
    line-height: 1.6;
    margin: 0;
}
</style>