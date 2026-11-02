<template>
    <figure class="flow">
        <div class="flow__node">Teacher message</div>
        <div class="flow__arrow"></div>
        <div class="flow__node is-agent">
            <strong>Intent agent</strong>
            Extract a structured search
        </div>

        <div class="flow__split flow__split--3">
            <div class="flow__branch is-exit">
                <span class="flow__label">Not about finding activities</span>
                <div class="flow__node">Point to the Help page</div>
            </div>
            <div class="flow__branch">
                <span class="flow__label">Clear request</span>
                <div class="flow__node is-main">Search</div>
            </div>
            <div class="flow__branch is-exit">
                <span class="flow__label">Too vague</span>
                <div class="flow__node">Ask one clarifying question</div>
            </div>
        </div>

        <div class="flow__arrow"></div>
        <div class="flow__node is-store">
            <strong>Qdrant</strong>
            Search by meaning, filtered by grade and duration
        </div>

        <div class="flow__split flow__split--2">
            <div class="flow__branch">
                <span class="flow__label">Matches</span>
                <div class="flow__node is-store">
                    <strong>MySQL</strong>
                    Load active activities in relevance order
                </div>
            </div>
            <div class="flow__branch">
                <span class="flow__label">No matches</span>
                <div class="flow__node is-store">
                    <strong>MySQL</strong>
                    Keyword fallback
                </div>
            </div>
        </div>

        <div class="flow__merge"><div class="flow__arrow"></div></div>
        <div class="flow__node is-agent">
            <strong>Recommender agent</strong>
            Pick 2–5 and explain why
        </div>
        <div class="flow__arrow"></div>
        <div class="flow__node is-check">
            <strong>Application code</strong>
            Check the IDs against the candidates
        </div>
        <div class="flow__arrow"></div>
        <div class="flow__node is-main">Reply, activity cards and follow-up ideas</div>

        <figcaption>
            The language model does the two steps marked as agents. The application controls everything else.
        </figcaption>
    </figure>
</template>
