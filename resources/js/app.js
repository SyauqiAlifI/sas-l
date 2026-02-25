// Core initialization function
function initApp() {
    initCounters();
    updateActiveLinks();
    handleScroll();
}

// Event Listeners
document.addEventListener("DOMContentLoaded", initApp);
document.addEventListener("livewire:navigated", initApp);

// Scroll Effect (Global Listener)
function handleScroll() {
    const navbar = document.querySelector("#navbar");
    if (!navbar) return;

    if (window.scrollY > 10) {
        navbar.classList.add("shadow-lg", "bg-white", "dark:bg-neutral-900");
    } else {
        navbar.classList.remove("shadow-lg", "bg-white", "dark:bg-neutral-900");
    }
}

window.addEventListener("scroll", handleScroll);

// Counter Animation Logic
function initCounters() {
    const counters = document.querySelectorAll(".counter");
    const speed = 200;

    const observerOptions = {
        threshold: 0.5,
    };

    const counterObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach((entry) => {
            if (entry.isIntersecting) {
                const counter = entry.target;
                const animate = () => {
                    const target = +counter.getAttribute("data-target");
                    const data = +counter.innerText;
                    const time = target / speed;

                    if (data < target) {
                        counter.innerText = Math.ceil(data + time);
                        setTimeout(animate, 10);
                    } else {
                        counter.innerText = target;
                    }
                };
                animate();
                observer.unobserve(counter);
            }
        });
    }, observerOptions);

    counters.forEach((counter) => {
        counterObserver.observe(counter);
    });
}

// Active Link Detection
function updateActiveLinks() {
    const currentPath = window.location.pathname;
    const navLinks = document.querySelectorAll("#nav-items a, #sidebar [href]");

    navLinks.forEach((link) => {
        const linkPath = new URL(link.href, window.location.origin).pathname;

        // Check if paths match. For home, require exact match. For others, check if it starts with the path.
        if (
            (linkPath === "/" && currentPath === "/") ||
            (linkPath !== "/" && currentPath.startsWith(linkPath))
        ) {
            link.classList.add("active");
        } else {
            link.classList.remove("active");
        }
    });
}
