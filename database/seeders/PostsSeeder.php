<?php

namespace Database\Seeders;

use App\Models\LocalPost;
use Illuminate\Database\Seeder;

class PostsSeeder extends Seeder
{
    public function run(): void
    {
        $posts = [
            [
                'title'        => 'Getting Started with AI Agents: A Beginner\'s Guide',
                'slug'         => 'getting-started-with-ai-agents',
                'category'     => 'Tutorial',
                'excerpt'      => 'Learn the fundamentals of AI agents, how they work, and how to deploy your first agent in production.',
                'status'       => 'publish',
                'published_at' => '2026-05-15 09:00:00',
                'content'      => <<<'HTML'
<h2>What is an AI Agent?</h2>
<p>An AI agent is an autonomous software system that can perceive its environment, make decisions, and take actions to achieve specific goals. Key characteristics include autonomy, reactivity, proactivity, and adaptability.</p>

<h2>Types of AI Agents</h2>
<ol>
  <li><strong>Content Creation Agents</strong> — Generate written content and media for marketing and blogging purposes.</li>
  <li><strong>Data Analysis Agents</strong> — Analyse datasets and identify patterns for business intelligence.</li>
  <li><strong>Customer Support Agents</strong> — Handle interactions and resolve issues continuously without human involvement.</li>
  <li><strong>Automation Agents</strong> — Manage repetitive workflows and tasks.</li>
</ol>

<h2>Why Use AI Agents?</h2>
<p>The platform highlights five primary benefits:</p>
<ul>
  <li>Round-the-clock operation without breaks</li>
  <li>Reduced operational expenses through task automation</li>
  <li>Ability to handle growing workloads efficiently</li>
  <li>Uniform quality across all customer interactions</li>
  <li>Superior speed compared to manual processes</li>
</ul>

<h2>Getting Started with ApiSpi</h2>
<p>The onboarding process involves five steps:</p>
<ol>
  <li>Select an agent from the marketplace</li>
  <li>Create an account (free 14-day trial)</li>
  <li>Configure the agent to match your requirements</li>
  <li>Integrate with existing systems via API</li>
  <li>Use analytics to monitor and refine performance</li>
</ol>

<h2>Best Practices &amp; Common Challenges</h2>
<p>Success requires starting with clear objectives, using quality training data, regular performance monitoring, human oversight planning, and security considerations. Common obstacles include quality assurance, integration complexity, and user adoption — each addressed through proper training, pre-built integrations, and clear documentation.</p>
HTML,
            ],
            [
                'title'        => 'Best Practices for Production AI Agents',
                'slug'         => 'best-practices-production-ai-agents',
                'category'     => 'Guide',
                'excerpt'      => 'Discover proven strategies for deploying reliable, scalable agents at enterprise scale.',
                'status'       => 'publish',
                'published_at' => '2026-05-12 09:00:00',
                'content'      => <<<'HTML'
<h2>1. Architecture and Design</h2>
<p><strong>Microservices Architecture</strong><br>Design your agent system using microservices principles. This allows for better scalability, easier updates, and improved fault isolation.</p>
<p><strong>Stateless Agents</strong><br>Keep agents stateless where possible. Store conversation history and context externally to make horizontal scaling much easier.</p>
<p><strong>Event-Driven Design</strong><br>Use event-driven architecture to decouple components, making your system more resilient and easier to maintain.</p>

<h2>2. Monitoring and Observability</h2>
<p><strong>Comprehensive Logging</strong><br>Log all significant events, decisions, and errors. This helps with debugging and understanding agent behaviour.</p>
<p>Track key performance indicators:</p>
<ul>
  <li>Response time and latency</li>
  <li>Success and error rates</li>
  <li>User satisfaction scores</li>
  <li>Resource utilisation</li>
</ul>
<p><strong>Tracing</strong><br>Implement distributed tracing to track requests across multiple systems — crucial for debugging complex setups.</p>

<h2>3. Quality Assurance</h2>
<p>Implement comprehensive testing at every level:</p>
<ul>
  <li>Unit tests for individual components</li>
  <li>Integration tests for system interactions</li>
  <li>End-to-end tests for complete workflows</li>
  <li>Performance tests under load</li>
</ul>
<p>Always test changes in a staging environment that mirrors production. Roll out new versions gradually using canary deployments to reduce risk.</p>

<h2>4. Performance Optimisation</h2>
<p>Implement smart caching strategies to reduce latency and computational costs. Distribute traffic across multiple agent instances. Set resource limits (CPU, memory, timeouts) to prevent runaway processes.</p>

<h2>5. Security</h2>
<p>Implement robust authentication and fine-grained authorisation controls. Encrypt data in transit and at rest. Always validate and sanitise user inputs to prevent injection attacks.</p>

<h2>6. Scalability</h2>
<p>Design agents to scale horizontally by adding more instances. Use message queues to handle asynchronous processing and decouple components. Optimise database queries and consider caching layers for frequently accessed data.</p>

<h2>7. Maintenance and Updates</h2>
<p>Maintain clear version control for your agents. Keep comprehensive documentation. Keep dependencies updated and apply security patches promptly.</p>

<h2>8. Cost Management</h2>
<p>Monitor resource usage and costs closely. Use batch processing for large workloads to reduce per-unit costs. Consider reserved capacity for consistent baseline traffic.</p>

<h2>Conclusion</h2>
<p>Successful production deployment demands focus on architecture, monitoring, quality, performance, security, and scalability. Use this guidance as a foundation — customise approaches based on your unique circumstances and growth trajectory.</p>
HTML,
            ],
            [
                'title'        => 'The Future of Agentic AI: What\'s Next?',
                'slug'         => 'future-of-agentic-ai',
                'category'     => 'Insights',
                'excerpt'      => 'Explore emerging trends in agentic AI, upcoming technologies, and the future roadmap of autonomous agents.',
                'status'       => 'publish',
                'published_at' => '2026-05-08 09:00:00',
                'content'      => <<<'HTML'
<h2>Current State</h2>
<p>As of 2026, AI agents are widely adopted across industries including customer service, content creation, and data analysis. However, these systems remain relatively narrow in focus and struggle with complexity and context switching.</p>

<h2>Five Emerging Trends</h2>
<ol>
  <li><strong>Multi-Agent Systems</strong> — Coordinating specialised agents (research, data analysis, writing, review) to handle complex workflows collaboratively.</li>
  <li><strong>Improved Reasoning</strong> — Agents that break down problems, recognise knowledge gaps, explain decisions, and adapt strategies dynamically.</li>
  <li><strong>Real-Time Learning</strong> — Continuous learning from interactions rather than static trained models.</li>
  <li><strong>Multimodal Agents</strong> — Seamless handling of text, images, audio, and video in a single workflow.</li>
  <li><strong>Autonomous Decision-Making with Constraints</strong> — Operating within ethical boundaries with appropriate human oversight.</li>
</ol>

<h2>Technological Advances</h2>
<p>Key developments include efficient models for edge deployment, expanded context windows, better tool integration, and advanced verification systems that allow agents to reason about their own confidence.</p>

<h2>Industry Applications</h2>
<p>Healthcare, finance, scientific research, creative industries, and manufacturing are the sectors where autonomous agents will deliver the most significant impact over the coming years.</p>

<h2>Challenges Ahead</h2>
<p>Alignment, transparency, regulatory frameworks, and bias mitigation require ongoing attention from both platform providers and the organisations that deploy agents.</p>

<h2>Timeline: 2026–2030</h2>
<p>The industry is projected to progress from multi-agent coordination through real-time learning, advanced reasoning, and ultimately fully autonomous systems operating safely at scale. Organisations that begin building agent expertise now will have a decisive advantage.</p>
HTML,
            ],
            [
                'title'        => 'Building Custom Agents: Advanced Techniques',
                'slug'         => 'building-custom-agents-advanced-techniques',
                'category'     => 'Advanced',
                'excerpt'      => 'Deep dive into advanced techniques for building specialised agents tailored to your specific business needs.',
                'status'       => 'publish',
                'published_at' => '2026-05-05 09:00:00',
                'content'      => <<<'HTML'
<h2>Understanding When to Build Custom</h2>
<p>Before pursuing custom development, evaluate whether marketplace pre-built agents can meet your needs. Custom builds become necessary when:</p>
<ul>
  <li>Your domain requires specialised terminology or workflows beyond general-purpose agents</li>
  <li>Deep integration with proprietary internal systems is required</li>
  <li>Regulatory or compliance mandates demand bespoke solutions</li>
  <li>Fine-grained control over agent decision logic is essential</li>
</ul>

<h2>1. Designing the Agent's Core Loop</h2>
<p>Effective agents follow a perceive–reason–act cycle. The perception phase gathers inputs from text, structured data, APIs, or tool outputs. During reasoning, the agent builds problem representations and determines optimal actions. The action phase executes decisions through tool calls, responses, or state updates.</p>
<p>Establish explicit objective statements before coding. Vague goals lead to inconsistent behaviour under edge cases. Strong objectives specify desired outcomes, constraints, and success criteria.</p>

<h2>2. Prompt Engineering for Custom Agents</h2>
<p>Foundation system prompts should include role definition, behavioural constraints, output format requirements, and response examples. Conciseness matters — excessive verbosity dilutes model attention.</p>
<p>Three to five high-quality domain-specific examples consistently outperform numerous mediocre ones, particularly for edge cases. Instructing agents to reason step-by-step before final answers reduces logical errors and creates auditable reasoning processes.</p>

<h2>3. Tool Use and Function Calling</h2>
<p>Tools should feature narrow, single-responsibility scopes with explicit parameter types and descriptive documentation. Tools should return structured error messages rather than exceptions, allowing agents to recover gracefully.</p>
<p>Complex workflows benefit from retry logic with exponential backoff, maximum chain depth limits preventing infinite loops, and comprehensive step logging.</p>

<h2>4. Memory and Context Management</h2>
<p>Context windows function as working memory. Summarise older conversation portions to conserve space while maintaining recent relevant information. Vector databases enable agents to recall information across sessions through semantic search, supporting both episodic memory (specific past interactions) and semantic memory (general knowledge).</p>

<h2>5. Multi-Agent Orchestration</h2>
<p>Break complex tasks across specialised sub-agents coordinated by supervisor agents that decompose tasks, delegate to workers, aggregate results, and resolve conflicts. Define structured message schemas for agent communication, preferring typed payloads over raw text.</p>

<h2>6. Evaluation and Iteration</h2>
<p>Create curated test cases covering typical inputs, edge cases, and known failure modes. Automate evaluation and track pass rates continuously. Capture user feedback signals and route low-confidence outputs to human reviewers. Run controlled A/B experiments when introducing significant changes.</p>

<h2>Conclusion</h2>
<p>Custom agent development combines product design with engineering. Successful organisations prioritise clear objectives, rigorous evaluation, and tight feedback loops. Start simply, measure thoroughly, and iterate toward production readiness.</p>
HTML,
            ],
            [
                'title'        => 'Scaling Agents: From Prototype to Production',
                'slug'         => 'scaling-agents-prototype-to-production',
                'category'     => 'Infrastructure',
                'excerpt'      => 'Learn how to scale your AI agents from proof-of-concept to handling millions of interactions daily.',
                'status'       => 'publish',
                'published_at' => '2026-05-01 09:00:00',
                'content'      => <<<'HTML'
<h2>Overview</h2>
<p>Moving AI agents from working demos to production systems that handle millions of interactions reliably and cost-effectively is one of the most challenging engineering problems teams face. This guide outlines the key stages and decisions.</p>

<h2>The Three Stages of Scale</h2>
<p>Deployments progress through distinct phases:</p>
<ul>
  <li><strong>Prototype (0–1K req/day):</strong> Focus on validation and rapid learning.</li>
  <li><strong>Growth (1K–100K req/day):</strong> Implement monitoring, autoscaling, and error budgets.</li>
  <li><strong>Scale (100K+ req/day):</strong> Emphasise caching, batching, and cost efficiency.</li>
</ul>
<p><em>Resist the urge to over-engineer in the prototype stage — infrastructure debt is cheaper to pay than feature debt is to unwind.</em></p>

<h2>1. Infrastructure Foundations</h2>
<p>Use container-based deployment from the start. Design agents to be stateless — externalise all state to databases and caches. Manage infrastructure as code using tools like Terraform or Pulumi to ensure reproducibility.</p>

<h2>2. Autoscaling Strategies</h2>
<p>Implement Horizontal Pod Autoscaling based on CPU or custom metrics. Use queue-based scaling for asynchronous workloads and predictive scaling for known traffic patterns such as business-hour spikes.</p>

<h2>3. Caching Approaches</h2>
<p>Semantic response caching can deliver 30–50% cost reduction. Cache tool results with appropriate TTLs. Leverage prompt prefix caching available in modern LLM APIs to reduce repeated token processing costs.</p>

<h2>4. Database Architecture</h2>
<p>Use read replicas to separate query traffic from write traffic. Implement connection pooling with tools like PgBouncer. Consider event sourcing for complete audit trails that support replay and debugging.</p>

<h2>5. Cost Management</h2>
<p>Enforce token budgets at the application layer. Route simple tasks to cheaper, faster models using tiered model selection. Batch process non-latency-critical workloads to optimise per-unit costs.</p>

<h2>6. Reliability Engineering</h2>
<p>Implement circuit breakers for all external service calls. Plan graceful degradation strategies so partial failures don't cascade. Use chaos engineering proactively to surface failure modes before users encounter them.</p>

<h2>Key Takeaway</h2>
<p>Success requires early instrumentation and observation-driven decisions about which bottlenecks to address next. Instrument everything from day one, then let data guide your scaling investments.</p>
HTML,
            ],
            [
                'title'        => 'Monitoring and Optimisation: Keeping Your Agents Healthy',
                'slug'         => 'monitoring-optimisation-keeping-agents-healthy',
                'category'     => 'Operations',
                'excerpt'      => 'Discover essential monitoring practices and optimisation techniques to keep your agents performing at their best.',
                'status'       => 'publish',
                'published_at' => '2026-04-28 09:00:00',
                'content'      => <<<'HTML'
<h2>Why Monitoring Matters</h2>
<p>Deployed agents require active monitoring to prevent problems from escalating. Models drift, upstream APIs change, user behaviour evolves — and without monitoring, you find out about problems from angry customers rather than dashboards.</p>

<h2>The Four Pillars of Agent Observability</h2>
<ol>
  <li><strong>Metrics</strong> — System health indicators: error rate, latency, throughput.</li>
  <li><strong>Logs</strong> — Details of specific interactions.</li>
  <li><strong>Traces</strong> — Time distribution across multi-step requests.</li>
  <li><strong>Quality signals</strong> — Output quality assessment. The most neglected and most important pillar.</li>
</ol>

<h2>Key Metrics to Track</h2>
<p><strong>Latency:</strong> Monitor response times at 50th, 95th, and 99th percentiles. The p95 and p99 metrics matter most to real user experience.</p>
<p><strong>Error Rate:</strong> Categorise failures by type and segment by agent, user cohort, and request category to identify patterns.</p>
<p><strong>Throughput &amp; Queue Depth:</strong> Track requests per second and queue accumulation as indicators for scaling decisions.</p>
<p><strong>Token Usage &amp; Cost:</strong> Monitor token counts and conversation costs to detect anomalies and cost overruns early.</p>

<h2>Structured Logging</h2>
<p>Use JSON format with unique trace IDs. Log sanitised inputs, tool calls, outputs, latency, and token counts. Avoid raw PII — hash sensitive fields. Sample verbose logs at 1–5% in high-volume environments. Propagate correlation IDs across services for full request tracing.</p>

<h2>Quality Monitoring</h2>
<p>Implement automated scoring for hallucinations, relevance, and policy compliance. Collect user feedback through both explicit signals (thumbs up/down) and implicit signals (session length, repeat queries). Detect concept drift in query distributions to identify when retraining may be needed.</p>

<h2>Alerting Strategy</h2>
<p>Alert on user-facing symptoms rather than system internals. Maintain actionable alerts — each alert should have a corresponding runbook. Avoid alert fatigue by tuning thresholds carefully.</p>

<h2>Performance Optimisation</h2>
<p>Profile before optimising — avoid premature optimisation. Audit and trim system prompts and few-shot examples regularly. Execute independent tool calls in parallel to reduce total latency. Cache aggressively at every layer where freshness requirements allow.</p>
HTML,
            ],
            [
                'title'        => 'Real-World Success Stories: Agents in Action',
                'slug'         => 'real-world-success-stories-agents-in-action',
                'category'     => 'Case Studies',
                'excerpt'      => 'Explore how companies are using ApiSpi to transform their operations and improve customer experiences.',
                'status'       => 'publish',
                'published_at' => '2026-04-25 09:00:00',
                'content'      => <<<'HTML'
<h2>Case Study 1: Regional Bank — Intelligent Document Processing</h2>
<p>A mid-sized regional bank processed hundreds of loan applications weekly, with loan officers manually extracting data from documents, cross-referencing systems, and preparing risk summaries — consuming 45–90 minutes per application with frequent transcription errors.</p>
<p>ApiSpi's Data Analyzer agent was configured for financial document processing, extracting structured data, flagging discrepancies, and drafting risk summaries for officer review.</p>
<ul>
  <li>Processing time reduced from 60 to 8 minutes average</li>
  <li>Data extraction error rate dropped 94%</li>
  <li>Application throughput increased 6× without additional hiring</li>
  <li>Loan officers report improved job satisfaction</li>
</ul>

<h2>Case Study 2: E-Commerce Retailer — 24/7 Customer Support</h2>
<p>A fast-growing online retailer handled 3,000+ daily support tickets but only operated during business hours, leaving Asia-Pacific customers underserved and causing declining satisfaction scores.</p>
<p>ApiSpi's Support Bot agent was integrated with their order management, product catalogue, and returns portal systems.</p>
<ul>
  <li>72% of tickets fully resolved without human intervention</li>
  <li>Average first response time reduced from 4 hours to 38 seconds</li>
  <li>CSAT score improved from 3.4 to 4.6 out of 5</li>
  <li>Human agents focus exclusively on complex cases</li>
</ul>

<h2>Case Study 3: Professional Services Firm — Knowledge Management</h2>
<p>A management consultancy had accumulated years of research across siloed document stores, causing consultants to spend 2–3 hours per project searching for prior work and duplicating analysis.</p>
<p>ApiSpi's Knowledge Management agent was connected to SharePoint libraries, project management systems, and internal wikis, enabling natural-language queries.</p>
<ul>
  <li>Research time reduced by an average of 2.1 hours per project</li>
  <li>Duplicate analysis work decreased 60% in the first quarter</li>
  <li>New consultants reach full productivity 40% faster</li>
</ul>

<h2>Case Study 4: Government Agency — Compliance and Audit</h2>
<p>A government procurement agency needed annual reviews of thousands of vendor submissions for regulatory compliance, but manual review was slow, inconsistent, and created significant backlogs.</p>
<p>ApiSpi's Security and Compliance agent performs first-pass review against configurable compliance rulebooks, flagging non-compliant items with rule citations.</p>
<ul>
  <li>First-pass review time reduced from 3 days to 4 hours per submission</li>
  <li>Improved consistency across all submissions</li>
  <li>Procurement cycle shortened by 22 days on average</li>
</ul>

<h2>Case Study 5: Media Company — Content at Scale</h2>
<p>A digital media publisher struggled to produce localised content across eight markets in six languages while managing costs. ApiSpi's Content Creator agent was fine-tuned with brand guidelines to draft articles, posts, and newsletters for editor review.</p>
<ul>
  <li>Content output increased 4× without expanding editorial staff</li>
  <li>Localisation costs reduced 70%</li>
  <li>Time from story brief to publication reduced from 2 days to 4 hours</li>
</ul>

<h2>Case Study 6: Trades and Construction — End-to-End Job Management</h2>
<p>A mid-sized construction contractor managing 40–60 active jobs experienced administrative overhead consuming hours daily on scheduling, quote approvals, material tracking, and client updates. ApiSpi's Support Bot and Bid and Tender agents were integrated with job management software, supplier portals, and client communication channels.</p>
<ul>
  <li>Quote preparation time reduced from half a day to under 45 minutes</li>
  <li>Client callback volume dropped 65%</li>
  <li>Operations manager reclaimed 12+ hours weekly</li>
  <li>On-time completion improved from 71% to 89% within six months</li>
</ul>

<h2>Cross-Case Success Patterns</h2>
<ol>
  <li><strong>Human-in-the-loop design:</strong> All deployments preserved human oversight — agents amplify rather than replace human judgement.</li>
  <li><strong>Narrow initial scope:</strong> Organisations began with a single well-defined use case before expanding.</li>
  <li><strong>Deep system integration:</strong> Highest-impact deployments connected agents to existing CRMs, ERPs, and document stores.</li>
  <li><strong>Continuous iteration:</strong> All organisations treated launch as a beginning, not a completion.</li>
</ol>

<p><em>AI agents deliver the most value when designed around real workflows, given access to appropriate systems, and maintained in productive partnership with the humans they support.</em></p>
HTML,
            ],
            [
                'title'        => 'API Integration Guide: Connect Your Systems',
                'slug'         => 'api-integration-guide-connect-your-systems',
                'category'     => 'Integration',
                'excerpt'      => 'Complete guide on integrating ApiSpi agents with your existing systems and applications via our API.',
                'status'       => 'publish',
                'published_at' => '2026-04-22 09:00:00',
                'content'      => <<<'HTML'
<h2>Introduction</h2>
<p>An AI agent is only as powerful as the systems it can reach. This guide covers the three primary integration surfaces available through the ApiSpi platform and the best practices for each.</p>

<h2>Integration Architecture Overview</h2>
<p>ApiSpi supports three main integration approaches:</p>
<ul>
  <li><strong>Inbound API:</strong> Allows your applications to send requests to agents.</li>
  <li><strong>Outbound tools:</strong> Enable agents to call your external APIs and services.</li>
  <li><strong>Webhooks and events:</strong> Deliver real-time notifications of agent activity to your systems.</li>
</ul>

<h2>1. Authentication and Authorisation</h2>
<p>API keys require bearer tokens in <code>Authorization</code> headers. Keys should be rotated annually or after any suspected compromise. Scoped permissions follow least-privilege principles. Webhook payloads use HMAC-SHA256 signature verification to ensure authenticity.</p>

<h2>2. The Inbound API</h2>
<p>Three request types are available:</p>
<ul>
  <li><strong>Synchronous:</strong> Blocks until the agent responds. Requires 60+ second timeout settings.</li>
  <li><strong>Asynchronous:</strong> Returns a job ID immediately; the result is delivered via webhook.</li>
  <li><strong>Streaming:</strong> Server-Sent Events for progressive token rendering in the UI.</li>
</ul>

<h2>3. Outbound Tools</h2>
<p>Custom tools require a name, description, and JSON Schema parameter definitions. Tool endpoints must be HTTPS and respond within 30 seconds. Error responses should be structured JSON — never raw HTML. Pre-built connectors are available for Salesforce, Jira, Slack, Microsoft Teams, and others.</p>

<h2>4. Webhooks and Event Streams</h2>
<p>Configurable event filtering reduces processing overhead. Payloads include event type, timestamp, agent ID, and conversation ID. Retries use exponential backoff for up to 24 hours. Receiving endpoints must be idempotent to handle safe retries correctly.</p>

<h2>5. Session and Context Management</h2>
<p>Session IDs maintain conversation continuity across multiple requests. Context injection provides structured background data (user profile, account details) that the agent can reference throughout the session. Sessions expire after configurable inactivity (default 30 minutes).</p>

<h2>6. Testing</h2>
<p>Use the sandbox environment to isolate development from production traffic. The replay feature lets you test configuration changes against past real conversations. Coordinate load testing with the ApiSpi team to ensure appropriate infrastructure provisioning.</p>

<h2>Conclusion</h2>
<p>Successful integration requires upfront investment in understanding the available surfaces and designing appropriate data flows. Enterprise customers should consult the ApiSpi solutions team for architecture reviews before beginning complex integrations.</p>
HTML,
            ],
            [
                'title'        => 'Security and Compliance: Protecting Your Data',
                'slug'         => 'security-and-compliance-protecting-your-data',
                'category'     => 'Security',
                'excerpt'      => 'Important information about security features, compliance certifications, and best practices for data protection.',
                'status'       => 'publish',
                'published_at' => '2026-04-19 09:00:00',
                'content'      => <<<'HTML'
<h2>Introduction</h2>
<p>When deploying an AI agent, organisations position an autonomous system at their operational boundary. This requires serious security engineering from both the platform and the customer. This article outlines ApiSpi's platform protections and the security measures your team should implement.</p>

<h2>Platform Security Foundations</h2>
<p>All ApiSpi data in transit uses TLS 1.3 encryption. Stored data — conversation logs, configurations, embeddings — receives AES-256 encryption with automatic key rotation and complete audit logging. Enterprise customers choose geographic regions for data storage and processing, supporting GDPR, the Australian Privacy Act, and similar frameworks. Customer data is logically isolated across all stack layers.</p>

<h2>1. Compliance Certifications</h2>
<p><strong>SOC 2 Type II:</strong> ApiSpi maintains annual SOC 2 Type II attestation covering security, availability, and confidentiality.</p>
<p><strong>ISO 27001:</strong> Information security management is ISO 27001 certified, demonstrating systematic security management with regular risk assessments.</p>
<p><strong>GDPR and Privacy:</strong> ApiSpi operates as a GDPR data processor, providing Data Processing Agreements. Privacy engineering reviews all new features for impact.</p>
<p><strong>HIPAA:</strong> Healthcare customers receive HIPAA-eligible configurations with Business Associate Agreements, enhanced audit logging, and dedicated isolated infrastructure.</p>

<h2>2. Access Control</h2>
<p>The ApiSpi dashboard supports granular RBAC. Custom roles can define permissions at read-only, write, or admin levels. Enterprise plans support SAML 2.0 and OIDC-based SSO with enforced MFA. API keys should be rotated regularly, scoped per environment, and injected at runtime via secrets management tools such as AWS Secrets Manager or HashiCorp Vault.</p>

<h2>3. Prompt Injection and Agent Safety</h2>
<p>Prompt injection is the primary AI agent security risk. Attackers embed instructions in content agents process — documents, web pages, user inputs — attempting behavioural hijacking. To defend against this:</p>
<ul>
  <li>Sanitise user inputs before agent processing. Strip HTML and markdown from plain-text inputs.</li>
  <li>Wrap external content in clear delimiters so agents distinguish data from instructions.</li>
  <li>Assign agents only necessary tools. Narrow permissions reduce damage from successful manipulation.</li>
  <li>Validate agent outputs before executing downstream actions, particularly for high-stakes operations.</li>
</ul>

<h2>4. Data Minimisation and Retention</h2>
<p>Include only necessary data in agent prompts. Configure retention policies through the dashboard to match compliance requirements. Conversation logs can be auto-purged after defined periods. For EU residents or those with erasure rights, use the API's session-based data deletion capability.</p>

<h2>5. Incident Response</h2>
<p>Enable anomaly detection alerts in the dashboard. Unusual patterns — failed tool call spikes, response length increases, unexpected API request origins — may indicate security events. ApiSpi commits to notifying affected customers within 72 hours of confirmed incidents per GDPR Article 33.</p>
<p>Prepare your own incident response plan including API key rotation procedures, agent disablement methods, and log retrieval for forensics. Practice through tabletop exercises before you need it.</p>

<h2>Conclusion</h2>
<p>Security is a fundamental system property, not an add-on feature. While the platform manages significant security responsibilities, application-level choices — key management, permission scoping, input sanitisation — determine your overall system security posture. Contact ApiSpi's security team for detailed architecture reviews.</p>
HTML,
            ],
        ];

        foreach ($posts as $data) {
            LocalPost::updateOrCreate(
                ['slug' => $data['slug']],
                $data
            );
        }
    }
}
