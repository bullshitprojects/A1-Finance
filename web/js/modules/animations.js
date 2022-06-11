const animations = () => {
    const configs = {
        origin: 'top',
        distance: '80px',
        duration: 1500,
        delay: 200,
    }

    const animation = ScrollReveal({ ...configs })

    animation.reveal('.report__entry', { interval: 400 })
}

export default animations
