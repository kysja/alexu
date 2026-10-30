// Logos for the tech names used in the data files. A name matches the first entry
// it starts with, so "Laravel 7-13" and "Vue 3" work, and "GitLab" must come before "Git".
// `img` is a file in public/images/tech, `icon` is a Font Awesome class.
const logos = [
    ['php', { img: 'php' }],
    ['laravel', { img: 'laravel' }],
    ['mysql', { img: 'mysql' }],
    ['html', { img: 'html5' }],
    ['css', { img: 'css3' }],
    ['javascript', { img: 'javascript' }],
    ['jquery', { img: 'jquery' }],
    ['json', { img: 'json' }],
    ['bootstrap', { img: 'bootstrap' }],
    ['vue', { img: 'vuejs' }],
    ['inertia', { icon: 'fa-solid fa-bolt', color: '#9553e9' }],
    ['tailwind', { img: 'tailwindcss' }],
    ['node', { img: 'nodejs' }],
    ['python', { img: 'python' }],
    ['flask', { img: 'flask' }],
    ['c#', { img: 'csharp' }],
    ['xml', { icon: 'fa-solid fa-file-code' }],
    ['docker', { icon: 'fa-brands fa-docker', color: '#1d63ed' }],
    ['linux', { icon: 'fa-brands fa-linux', color: '#14232b' }],
    ['openai', { img: 'openai' }],
    ['codex', { img: 'openai' }],
    ['anthropic', { img: 'anthropic' }],
    ['claude', { icon: 'fa-brands fa-claude', color: '#d97757' }],
    ['gitlab', { img: 'gitlab' }],
    ['git', { img: 'git' }],
    ['jira', { img: 'jira' }],
    ['slack', { img: 'slack' }],
    ['digitalocean', { img: 'digitalocean' }],
    ['linode', { icon: 'fa-brands fa-linode', color: '#00a95c' }],
    ['ubuntu', { img: 'ubuntu' }],
    ['debian', { img: 'debian' }],
    ['apache', { img: 'apache' }],
    ['nginx', { img: 'nginx' }],
    ['lamp', { icon: 'fa-solid fa-server' }],
    ['generative ai', { icon: 'fa-solid fa-wand-magic-sparkles' }],
    ['llm', { icon: 'fa-solid fa-brain' }],
    ['mcp', { icon: 'fa-solid fa-circle-nodes' }],
    ['ai agents', { icon: 'fa-solid fa-robot' }],
    ['prompt', { icon: 'fa-solid fa-terminal' }],
    ['ai chatbots', { icon: 'fa-solid fa-comments' }],
    ['vector search', { icon: 'fa-solid fa-magnifying-glass' }],
    ['embeddings', { icon: 'fa-solid fa-diagram-project' }],
    ['retrieval', { icon: 'fa-solid fa-database' }],
    ['workflow', { icon: 'fa-solid fa-gears' }],
    ['mvc', { icon: 'fa-solid fa-layer-group' }],
    ['rest api', { icon: 'fa-solid fa-plug' }],
    ['third-party api', { icon: 'fa-solid fa-plug-circle-check' }],
    ['websockets', { icon: 'fa-solid fa-tower-broadcast' }],
    ['svg', { icon: 'fa-solid fa-bezier-curve' }],
    ['tkinter', { icon: 'fa-regular fa-window-maximize' }],
];

const fallback = { icon: 'fa-solid fa-code' };

export function techLogo(name) {
    const key = name.toLowerCase();

    return logos.find(([prefix]) => key.startsWith(prefix))?.[1] ?? fallback;
}
