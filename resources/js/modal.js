const open = (id) => {
    const dialog = document.getElementById(id);

    if (!dialog || dialog.open) {
        return;
    }

    dialog.showModal();
};

const upgrade = (dialog) => {
    if (!dialog.hasAttribute('open') || dialog.matches(':modal')) {
        return;
    }

    dialog.removeAttribute('open');
    dialog.showModal();
};

console.log("js file is loaded");

document.addEventListener('click', (event) => {
    const target = event.target;
    console.log("modal is clicked")

    const opener = target.closest('[data-modal-open]');

    if (opener) {
        event.preventDefault();
        open(opener.dataset.modalOpen);
        return;
    }

    const dialog = target.closest('dialog[data-modal]');

    if (!dialog) {
        return;
    }

    if (target.closest('[data-modal-close]')) {
        event.preventDefault();
        dialog.close();
        return;
    }

    if (target === dialog || target.hasAttribute('data-modal-backdrop')) {
        dialog.close();
    }
});

const observer = new MutationObserver((mutations) => {
    for (const mutation of mutations) {
        for (const node of mutation.addedNodes) {
            if (!(node instanceof Element)) {
                continue;
            }

            if (node.matches('dialog[data-modal][open]')) {
                upgrade(node);
            }

            node.querySelectorAll('dialog[data-modal][open]').forEach(upgrade);
        }
    }
});

observer.observe(document.documentElement, { childList: true, subtree: true });