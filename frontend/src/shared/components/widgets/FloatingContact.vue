<template>
    <div class="floating-contact-wrapper">
        <!-- Nút Zalo -->
        <a href="https://zalo.me/0901234567" target="_blank" class="contact-btn zalo-btn"
            title="Chat Zalo tư vấn phong thủy">
            <div class="pulse-ring"></div>
            <span class="btn-icon">💬</span>
            <span class="btn-label">Chat Zalo</span>
        </a>

        <!-- Nút Gọi Hotline -->
        <a href="tel:0901234567" class="contact-btn call-btn" title="Gọi hotline xưởng">
            <div class="pulse-ring red"></div>
            <span class="btn-icon">📞</span>
            <span class="btn-label">0901 234 567</span>
        </a>
    </div>
</template>

<style scoped>
.floating-contact-wrapper {
    position: fixed;
    bottom: 24px;
    left: 24px;
    z-index: 999;
    display: flex;
    flex-direction: column;
    gap: 12px;
}

.contact-btn {
    position: relative;
    display: flex;
    align-items: center;
    gap: 8px;
    padding: 8px 16px 8px 10px;
    border-radius: 30px;
    text-decoration: none;
    color: #ffffff;
    font-size: 13px;
    font-weight: 700;
    box-shadow: 0 4px 15px rgba(0, 0, 0, 0.2);
    transition: transform 0.2s ease;
}

.contact-btn:hover {
    transform: translateY(-3px) scale(1.02);
}

.zalo-btn {
    background: #0068ff;
}

.call-btn {
    background: #a32219;
}

.btn-icon {
    width: 32px;
    height: 32px;
    background: #ffffff;
    border-radius: 50%;
    display: flex;
    align-items: center;
    justify-content: center;
    font-size: 16px;
}

/* Hiệu ứng sóng lan tỏa Pulse */
.pulse-ring {
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 30px;
    border: 2px solid #0068ff;
    animation: pulse-animation 1.8s infinite;
    pointer-events: none;
}

.pulse-ring.red {
    border-color: #a32219;
}

@keyframes pulse-animation {
    0% {
        transform: scale(1);
        opacity: 0.8;
    }

    100% {
        transform: scale(1.25, 1.35);
        opacity: 0;
    }
}

@media (max-width: 576px) {
    .floating-contact-wrapper {
        bottom: 16px;
        left: 16px;
    }

    .btn-label {
        display: none;
    }

    .contact-btn {
        padding: 6px;
        border-radius: 50%;
    }

    .pulse-ring {
        border-radius: 50%;
    }
}
</style>