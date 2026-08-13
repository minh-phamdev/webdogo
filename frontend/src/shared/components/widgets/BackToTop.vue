<template>
    <transition name="fade">
        <button v-show="isVisible" class="back-to-top-btn bo-rounded shadow" @click="scrollToTop"
            title="Cuộn lên đầu trang">
            <span class="arrow">↑</span>
        </button>
    </transition>
</template>

<script setup>
import { ref, onMounted, onUnmounted } from 'vue'

const isVisible = ref(false)

const handleScroll = () => {
    isVisible.value = window.scrollY > 300
}

const scrollToTop = () => {
    window.scrollTo({
        top: 0,
        behavior: 'smooth'
    })
}

onMounted(() => {
    window.addEventListener('scroll', handleScroll)
})

onUnmounted(() => {
    window.removeEventListener('scroll', handleScroll)
})
</script>

<style scoped>
.bo-rounded {
    border-radius: 50%;
}

.shadow {
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.15);
}

.back-to-top-btn {
    position: fixed;
    bottom: 24px;
    right: 24px;
    z-index: 999;
    width: 44px;
    height: 44px;
    background: #2c1810;
    color: #e6c675;
    border: 1px solid #c59b27;
    cursor: pointer;
    display: flex;
    align-items: center;
    justify-content: center;
    transition: all 0.3s ease;
}

.back-to-top-btn:hover {
    background: #c59b27;
    color: #2c1810;
    transform: translateY(-3px);
}

.arrow {
    font-size: 20px;
    font-weight: 700;
}

/* Transition Fade */
.fade-enter-active,
.fade-leave-active {
    transition: opacity 0.3s ease;
}

.fade-enter-from,
.fade-leave-to {
    opacity: 0;
}
</style>