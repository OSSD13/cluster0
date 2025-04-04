function toggleMenu(menuId, button) {
    let menu = document.getElementById(menuId); // เลือกเมนูที่ต้องการ
    let icon = button.querySelector("i"); // เลือกลูกศรที่เป็นไอคอนภายในปุ่ม

    // ถ้า navbar เป็นขนาด w-[100px] ซ่อนเมนูทั้งหมด
    if (navbar.classList.contains('w-[100px]')) {
        return; // ไม่ทำอะไรถ้า navbar ขนาดเล็ก
    }

    // ปิดเมนูอื่นๆ ก่อนเปิดอันใหม่
    document.querySelectorAll(".submenu").forEach(sub => {
        if (sub.id !== menuId) {
            sub.classList.add("hidden");
            sub.previousElementSibling.querySelector("i").classList.remove("rotate-90");
        }
    });

    // เปิด/ปิดเมนูที่กด
    menu.classList.toggle("hidden");

    // หมุนลูกศร
    icon.classList.toggle("rotate-90");
}

function toggleNavbar() {
    const navbar = document.getElementById('navbar');
    const logoContainer = document.getElementById('logo-container');
    const title = document.getElementById('navbar-title');
    // Text
    const dashboardText = document.getElementById('dashboard-text');
    const performanceReviewText = document.getElementById('performanceReview-text');
    const teamManagementText = document.getElementById('teamManagement-text');
    const memberManagementText = document.getElementById('memberManagement-text');
    const reportsText = document.getElementById('reports-text');
    const settingsText = document.getElementById('settings-text');
    // Icon
    const dashboardIcon = document.getElementById('dashboard-icon');
    const performanceReviewIcon = document.getElementById('performanceReview-icon');
    const teamManagementIcon = document.getElementById('teamManagement-icon');
    const memberManagementIcon = document.getElementById('memberManagement-icon');
    const reportsIcon = document.getElementById('reports-icon');
    const settingsIcon = document.getElementById('settings-icon');

    // จัดตำแหน่ง navbar ให้เป็น justify-center เสมอ
    navbar.classList.add('justify-center');

    // ตรวจสอบว่า navbar มี class w-[300px] หรือไม่ ถ้ามีให้เปลี่ยนไปเป็น w-[100px] หรือกลับกัน
    if (navbar.classList.contains('w-[300px]')) {
        navbar.classList.remove('w-[300px]');
        navbar.classList.add('w-[100px]');

        // ซ่อนเมนูทั้งหมดเมื่อ navbar เป็นขนาด w-[100px]
        document.querySelectorAll(".submenu").forEach(sub => {
            sub.classList.add("hidden");
            sub.previousElementSibling.querySelector("i").classList.remove("rotate-90");
        });

        // ซ่อนข้อความเมื่อ navbar เป็นขนาด w-[100px]
        dashboardText.classList.add('hidden');
        performanceReviewText.classList.add('hidden');
        teamManagementText.classList.add('hidden');
        memberManagementText.classList.add('hidden');
        reportsText.classList.add('hidden');
        settingsText.classList.add('hidden');
    } else {
        navbar.classList.remove('w-[100px]');
        navbar.classList.add('w-[300px]');

        // แสดงข้อความเมื่อ navbar กลับมาเป็นขนาด w-[300px]
        if (navbar.classList.contains('w-[300px]')) {
            dashboardText.classList.remove('hidden');
            performanceReviewText.classList.remove('hidden');
            teamManagementText.classList.remove('hidden');
            memberManagementText.classList.remove('hidden');
            reportsText.classList.remove('hidden');
            settingsText.classList.remove('hidden');
        }
    }

    // ซ่อนหรือแสดงข้อความของ title
    title.classList.toggle('hidden');

    // ซ่อนหรือแสดงไอคอน
    dashboardIcon.classList.toggle('hidden');
    performanceReviewIcon.classList.toggle('hidden');
    teamManagementIcon.classList.toggle('hidden');
    memberManagementIcon.classList.toggle('hidden');
    reportsIcon.classList.toggle('hidden');
    settingsIcon.classList.toggle('hidden');
}

function toggleProfileDropdown() {
    var dropdown = document.getElementById('profileDropdown');
    dropdown.classList.toggle('hidden');
}
