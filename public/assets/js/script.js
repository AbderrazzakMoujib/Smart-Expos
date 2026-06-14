$(window).on("load", function () {
    // Checking if Slick is loaded
    if (typeof $.fn.slick === "undefined") {
        console.error("Slick is not loaded. Make sure to include slick.min.js.");
        return;
    }
    console.log("✅ Slick is loaded.");

    // Initialize carousels after full page load
    initCarousels();
});

function initCarousels() {
    console.log("🔄 Initializing carousels...");

    // Add detailed logging and additional checks
    [
        {
            selector: "#blogSlide1",
            prevBtn: ".btn-prev",
            nextBtn: ".btn-next",
            slidesToShow: 3,
            lgSlidesToShow: 2,
            mdSlidesToShow: 1
        },
        {
            selector: "#partenaire",
            prevBtn: ".btn-prev-partner",
            nextBtn: ".btn-next-partner", 
            slidesToShow: 4,
            lgSlidesToShow: 2,
            mdSlidesToShow: 2
        },
        {
            selector: "#gallerySlider",
            prevBtn: ".btn-prev-gallery",
            nextBtn: ".btn-next-gallery",
            slidesToShow: 3,
            lgSlidesToShow: 2,
            mdSlidesToShow: 2
        },
        {
            selector: "#testimonialsSlider",
            slidesToShow: 4,
            lgSlidesToShow: 2,
            mdSlidesToShow: 1,
            autoplay: true,
            autoplaySpeed: 3000
        }
    ].forEach(carouselConfig => {
        safeInitCarousel(carouselConfig);
    });
}

function safeInitCarousel(config) {
    const $carousel = $(config.selector);
    
    // Detailed logging
    console.log(`🔍 Checking carousel: ${config.selector}`);
    console.log(`Carousel element count: ${$carousel.length}`);
    console.log(`Carousel children count: ${$carousel.children().length}`);

    // Additional validation
    if (!$carousel.length) {
        console.warn(`⚠️ Carousel element ${config.selector} not found. Skipping initialization.`);
        return;
    }

    // Check if there are enough children to create a carousel
    if ($carousel.children().length <= 1) {
        console.warn(`⚠️ Not enough items in ${config.selector} to create a carousel.`);
        return;
    }

    try {
        $carousel.slick({
            slidesToShow: config.slidesToShow || 1,
            slidesToScroll: 1,
            arrows: false,
            dots: false,
            autoplay: config.autoplay || false,
            autoplaySpeed: config.autoplaySpeed || 4000,
            responsive: [
                {
                    breakpoint: 992,
                    settings: { slidesToShow: config.lgSlidesToShow || 2 }
                },
                {
                    breakpoint: 768,
                    settings: { slidesToShow: config.mdSlidesToShow || 1 }
                }
            ]
        });

        // Setup navigation buttons if they exist
        if (config.prevBtn && $(config.prevBtn).length) {
            $(config.prevBtn).click(() => {
                $carousel.slick("slickPrev");
            });
        }

        if (config.nextBtn && $(config.nextBtn).length) {
            $(config.nextBtn).click(() => {
                $carousel.slick("slickNext");
            });
        }

        console.log(`✅ Successfully initialized carousel: ${config.selector}`);

    } catch (error) {
        console.error(`❌ Error initializing carousel ${config.selector}:`, error);
    }
}


$(document).ready(function() {
    // Hero Slider
    $('.hero-slider-2').slick({
        fade: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        arrows: false,
        dots: true,
        accessibility: false
    });

    // Blog Slider
    $('#blogSlide1').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        arrows: true,
        accessibility: false,
        responsive: [
            {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 1 }
            }
        ]
    });

    // Partner Slider
    $('#partenaire').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        prevArrow: $('.btn-prev-partner'),
        nextArrow: $('.btn-next-partner'),
        accessibility: false,
        responsive: [
            {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 1 }
            }
        ]
    });

    // Gallery Slider
    $('#gallerySlider').slick({
        slidesToShow: 3,
        slidesToScroll: 1,
        prevArrow: $('.btn-prev-gallery'),
        nextArrow: $('.btn-next-gallery'),
        accessibility: false,
        responsive: [
            {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 1 }
            }
        ]
    });

    // Video Slider
    $('[id="partenaire"][data-slide-show]').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        accessibility: false,
        responsive: [
            {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 768,
                settings: { slidesToShow: 1 }
            }
        ]
    });

    // Debug logging
    console.log('jQuery version:', $.fn.jquery);
    console.log('Slick version:', $.fn.slick.version || 'Unknown');
});

// Video Modal Functions
function openVideoModal(videoSrc) {
    const videoModal = document.getElementById('videoModal');
    const modalVideo = document.getElementById('modalVideo');
    modalVideo.src = videoSrc;
    videoModal.style.display = 'block';
    modalVideo.play();
}

function closeVideoModal() {
    const videoModal = document.getElementById('videoModal');
    const modalVideo = document.getElementById('modalVideo');
    videoModal.style.display = 'none';
    modalVideo.pause();
    modalVideo.currentTime = 0;
}
    document.addEventListener('DOMContentLoaded', function () {
        const postLinks = document.querySelectorAll('.post-link');
        
        postLinks.forEach(link => {
            link.addEventListener('click', function (event) {
                event.preventDefault();
                const seoTitle = this.getAttribute('data-seo-title');
                const metaDescription = this.getAttribute('data-meta-description');
                const metaKeywords = this.getAttribute('data-meta-keywords');

                document.title = seoTitle;
                updateMetaTag('description', metaDescription);
                updateMetaTag('keywords', metaKeywords);

                window.location.href = this.href;
            });
        });

        function updateMetaTag(name, content) {
            let metaTag = document.querySelector(`meta[name="${name}"]`);
            if (metaTag) {
                metaTag.setAttribute('content', content);
            } else {
                metaTag = document.createElement('meta');
                metaTag.setAttribute('name', name);
                metaTag.setAttribute('content', content);
                document.head.appendChild(metaTag);
            }
        }
    });




    // <!-- Scripts pour les animations -->

    document.addEventListener('DOMContentLoaded', function() {
        // Gestion du dropdown de langue
        document.getElementById('dropdownMenuButton1').addEventListener('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            const dropdown = document.getElementById('dropdownContent');
            dropdown.classList.toggle('show');
        });
        
        // Fermer le dropdown quand on clique ailleurs
        window.addEventListener('click', function(event) {
            if (!event.target.closest('.dropdown')) {
                const dropdowns = document.querySelectorAll('.dropdown-menu');
                dropdowns.forEach(dropdown => {
                    dropdown.classList.remove('show');
                });
            }
        });
        
        // Sélectionner les éléments du logo
        const headerLogo = document.querySelector('.header-logo img');
        const mobileLogo = document.querySelector('.mobile-logo img');
        
        // Variables pour l'animation
        let lastScrollTop = 0;
        let isScrolling;
        
        // Animation de la navbar au scroll
        const header = document.querySelector('.th-header');
        const logo = document.querySelector('.header-logo img');
        
        window.addEventListener('scroll', function() {
            let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
            
            // Effet sticky avec animation
            if (scrollTop > 50) {
                header.classList.add('sticky-active');
                
                // Animation du logo pour le réduire légèrement
                if (logo) {
                    logo.style.width = '180px';
                    logo.style.transform = 'scale(0.9)';
                    logo.style.transition = 'all 0.4s cubic-bezier(0.34, 1.56, 0.64, 1)';
                }
            } else {
                header.classList.remove('sticky-active');
                
                // Rétablir la taille du logo
                if (logo) {
                    logo.style.width = '230px';
                    logo.style.transform = 'scale(1)';
                }
            }
            
            // Animation hide/show au scroll
            if (scrollTop > lastScrollTop && scrollTop > 200) {
                // Scroll vers le bas - cacher le header
                header.style.transform = 'translateY(-100%)';
            } else {
                // Scroll vers le haut - montrer le header
                header.style.transform = 'translateY(0)';
            }
            
            // Mise à jour du dernier scroll
            lastScrollTop = scrollTop <= 0 ? 0 : scrollTop;
            
            // Réinitialiser le timer de défilement
            clearTimeout(isScrolling);
            
            // Pause animation while scrolling
            if (headerLogo) {
                headerLogo.style.animationPlayState = 'paused';
            }
            
            // Définir un timeout pour détecter quand l'utilisateur a arrêté de défiler
            isScrolling = setTimeout(function() {
                // Resume animation when scrolling stops
                if (headerLogo) {
                    headerLogo.style.animationPlayState = 'running';
                }
                
                // Animation légère quand l'utilisateur arrête de défiler
                if (headerLogo) {
                    headerLogo.style.transition = 'all 0.6s cubic-bezier(0.34, 1.56, 0.64, 1)';
                    if (scrollTop > 50) {
                        headerLogo.style.transform = 'scale(0.92)';
                    } else {
                        headerLogo.style.transform = 'scale(1.02)';
                        setTimeout(() => {
                            headerLogo.style.transform = 'scale(1)';
                        }, 300);
                    }
                }
            }, 200);
        });
        
        // Enhanced floating effect with mouse movement
        if (headerLogo) {
            const logoContainer = headerLogo.parentElement.parentElement;
            
            // Make logo float more dramatically on mouse hover
            logoContainer.addEventListener('mouseenter', function() {
                headerLogo.style.animationName = 'none'; // Reset animation
                
                setTimeout(() => {
                    headerLogo.style.animationName = 'floatAnimation';
                    headerLogo.style.animationDuration = '1.5s'; // Faster animation on hover
                    headerLogo.style.animationTimingFunction = 'ease-in-out';
                }, 10);
            });
            
            // Return to normal floating on mouse leave
            logoContainer.addEventListener('mouseleave', function() {
                headerLogo.style.animationName = 'none'; // Reset animation
                
                setTimeout(() => {
                    headerLogo.style.animationName = 'floatAnimation';
                    headerLogo.style.animationDuration = '3s'; // Back to normal speed
                    headerLogo.style.animationTimingFunction = 'ease-in-out';
                }, 10);
            });
            
            // Effet de clic sur le logo
            const logoLink = headerLogo.parentElement;
            logoLink.addEventListener('click', function() {
                headerLogo.style.transition = 'transform 0.2s ease';
                headerLogo.style.transform = 'scale(0.95)';
                headerLogo.style.animationPlayState = 'paused';
                
                setTimeout(() => {
                    let scrollTop = window.pageYOffset || document.documentElement.scrollTop;
                    if (scrollTop > 50) {
                        headerLogo.style.transform = 'scale(0.9)';
                    } else {
                        headerLogo.style.transform = 'scale(1)';
                    }
                    headerLogo.style.animationPlayState = 'running';
                }, 200);
            });
        }
        
        // Animation spéciale pour le logo mobile
        if (mobileLogo) {
            const mobileLogoLink = mobileLogo.parentElement;
            
            mobileLogoLink.addEventListener('click', function(e) {
                if (!e.target.closest('a')) return;
                
                mobileLogo.style.transition = 'all 0.5s cubic-bezier(0.68, -0.55, 0.27, 1.55)';
                mobileLogo.style.transform = 'rotate(360deg)';
                mobileLogo.style.animationPlayState = 'paused';
                
                setTimeout(() => {
                    mobileLogo.style.transform = 'rotate(0deg)';
                    mobileLogo.style.animationPlayState = 'running';
                }, 500);
            });
        }
        
        // Animation du menu mobile
        const menuToggles = document.querySelectorAll('.th-menu-toggle');
        const mobileMenu = document.querySelector('.th-menu-wrapper');
        
        menuToggles.forEach(toggle => {
            toggle.addEventListener('click', function() {
                mobileMenu.classList.toggle('menu-open');
                
                // Animation pour le body (empêcher le défilement)
                if (mobileMenu.classList.contains('menu-open')) {
                    document.body.style.overflow = 'hidden';
                    
                    // Animation d'entrée du logo mobile
                    if (mobileLogo) {
                        mobileLogo.style.opacity = '0';
                        mobileLogo.style.transform = 'translateX(-20px)';
                        
                        setTimeout(() => {
                            mobileLogo.style.transition = 'all 0.4s ease';
                            mobileLogo.style.opacity = '1';
                            mobileLogo.style.transform = 'translateX(0)';
                        }, 200);
                    }
                } else {
                    document.body.style.overflow = '';
                }
            });
        });
        
        // Animation des liens du menu mobile
        const mobileMenuLinks = document.querySelectorAll('.th-mobile-menu ul li a');
        
        mobileMenuLinks.forEach(link => {
            link.addEventListener('click', function() {
                mobileMenu.classList.remove('menu-open');
                document.body.style.overflow = '';
            });
        });
        
        // Animation pour Bootstrap dropdowns
        const bsDropdowns = document.querySelectorAll('[data-bs-toggle="dropdown"]');
        
        if (typeof bootstrap !== 'undefined') {
            bsDropdowns.forEach(dropdown => {
                dropdown.addEventListener('show.bs.dropdown', function(event) {
                    const dropdownMenu = event.target.nextElementSibling;
                    dropdownMenu.style.opacity = '0';
                    dropdownMenu.style.transform = 'translateY(10px)';
                    
                    setTimeout(() => {
                        dropdownMenu.style.opacity = '1';
                        dropdownMenu.style.transform = 'translateY(0)';
                    }, 10);
                });
            });
        }
        
        // Effet spécial d'ondulation du logo (comme un effet d'eau)
        const applyRippleEffect = () => {
            if (headerLogo) {
                headerLogo.style.transition = 'all 0.5s ease';
                headerLogo.style.transform = 'scale(1.02)';
                
                setTimeout(() => {
                    headerLogo.style.transform = 'scale(0.98)';
                    
                    setTimeout(() => {
                        headerLogo.style.transform = 'scale(1)';
                    }, 150);
                }, 150);
            }
        };
        
        // Appliquer l'effet d'ondulation après le chargement de la page
        setTimeout(applyRippleEffect, 1500);
    });




    // <!-- Add this to your JavaScript file -->

function openVideoModal(videoSrc) {
    const modal = document.getElementById('videoModal');
    const video = document.getElementById('modalVideo');
    
    video.src = videoSrc;
    modal.style.display = 'block';
    
    // Play video automatically when modal opens
    video.play();
    
    // Prevent body scrolling when modal is open
    document.body.style.overflow = 'hidden';
}

function closeVideoModal() {
    const modal = document.getElementById('videoModal');
    const video = document.getElementById('modalVideo');
    
    // Pause video when modal closes
    video.pause();
    video.src = '';
    
    modal.style.display = 'none';
    
    // Re-enable body scrolling
    document.body.style.overflow = 'auto';
}

// Close modal when clicking outside the video
window.onclick = function(event) {
    const modal = document.getElementById('videoModal');
    if (event.target == modal) {
        closeVideoModal();
    }
}

// <!-- End The Salons -->
document.addEventListener('DOMContentLoaded', function() {
    // Get all cards that need animation
    const cards = document.querySelectorAll('.animate-card');
    const images = document.querySelectorAll('.fade-in-image');
    
    // Observer for cards
    const cardObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    // Observer for images
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add a small delay before showing the image
                setTimeout(() => {
                    entry.target.classList.add('show');
                }, 300);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    // Apply observers to elements
    cards.forEach(card => cardObserver.observe(card));
    images.forEach(image => imageObserver.observe(image));
});


// gallery
document.addEventListener('DOMContentLoaded', function() {
    // Select all gallery images
    const galleryImages = document.querySelectorAll('.gallery-img');
    const imagePopup = document.getElementById('imagePopup');
    const popupImage = document.getElementById('popupImage');
    const popupClose = document.querySelector('.popup-close');
    const popupNext = document.querySelector('.popup-next');
    const popupPrev = document.querySelector('.popup-prev');

    let currentImageIndex = 0;
    let imageUrls = [];

    // Collect all image URLs
    galleryImages.forEach(img => {
        imageUrls.push(img.src);
    });

    // Open popup when image is clicked
    galleryImages.forEach((img, index) => {
        img.addEventListener('click', function() {
            currentImageIndex = index;
            openPopup(img.src);
        });
    });

    // Open popup function
    function openPopup(src) {
        popupImage.src = src;
        imagePopup.style.display = 'flex';
        document.body.style.overflow = 'hidden'; // Prevent scrolling
    }

    // Close popup function
    function closePopup() {
        imagePopup.style.display = 'none';
        document.body.style.overflow = 'auto'; // Restore scrolling
    }

    // Navigate to next image
    function nextImage() {
        currentImageIndex = (currentImageIndex + 1) % imageUrls.length;
        popupImage.src = imageUrls[currentImageIndex];
    }

    // Navigate to previous image
    function prevImage() {
        currentImageIndex = (currentImageIndex - 1 + imageUrls.length) % imageUrls.length;
        popupImage.src = imageUrls[currentImageIndex];
    }

    // Event Listeners
    if (popupClose) {
        popupClose.addEventListener('click', closePopup);
    }

    if (popupNext) {
        popupNext.addEventListener('click', nextImage);
    }

    if (popupPrev) {
        popupPrev.addEventListener('click', prevImage);
    }

    // Close popup when clicking outside the image
    imagePopup.addEventListener('click', function(e) {
        if (e.target === imagePopup) {
            closePopup();
        }
    });

    // Keyboard navigation
    document.addEventListener('keydown', function(e) {
        if (imagePopup.style.display === 'flex') {
            if (e.key === 'Escape') closePopup();
            if (e.key === 'ArrowRight') nextImage();
            if (e.key === 'ArrowLeft') prevImage();
        }
    });
});

// <!-- End The Salons -->

document.addEventListener('DOMContentLoaded', function() {
    // Get all cards that need animation
    const cards = document.querySelectorAll('.animate-card');
    const images = document.querySelectorAll('.fade-in-image');
    
    // Observer for cards
    const cardObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('show');
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    // Observer for images
    const imageObserver = new IntersectionObserver((entries, observer) => {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                // Add a small delay before showing the image
                setTimeout(() => {
                    entry.target.classList.add('show');
                }, 300);
                observer.unobserve(entry.target);
            }
        });
    }, { threshold: 0.1 });
    
    // Apply observers to elements
    cards.forEach(card => cardObserver.observe(card));
    images.forEach(image => imageObserver.observe(image));
});

