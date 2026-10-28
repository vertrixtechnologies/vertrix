<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Show the application landing page.
     */
    public function index(): View
    {
        $services = [
            [
                'id' => 'saas',
                'num' => '01',
                'icon' => 'Rocket',
                'title' => 'SaaS Development',
                'badge' => 'PRODUCT ENGINEERING',
                'description' => 'Engineering scalable, multi-tenant cloud SaaS platforms with automated billing, modular microservices, and high-concurrency architecture.',
                'tags' => ['Multi-Tenant Architecture', 'Stripe Billing & Subscriptions', 'Microservices & REST APIs', 'Automated CI/CD Pipelines'],
            ],
            [
                'id' => 'cybersecurity',
                'num' => '02',
                'icon' => 'ShieldCheck',
                'title' => 'Cybersecurity (SOC / VAPT)',
                'badge' => 'THREAT DEFENSE',
                'description' => 'Comprehensive threat defense with 24/7 SOC surveillance, rigorous VAPT penetration testing, OWASP Top 10 mitigation, and zero-trust security.',
                'tags' => ['VAPT Penetration Testing', '24/7 SOC Threat Monitoring', 'Zero-Trust Network Access', 'SOC 2 & ISO 27001 Readiness'],
            ],
            [
                'id' => 'webdev',
                'num' => '03',
                'icon' => 'Code2',
                'title' => 'Web Development',
                'badge' => 'FULL-STACK EXCELLENCE',
                'description' => 'High-performance full-stack web applications built on modern frameworks (Laravel, MERN stack, Django, Next.js) tailored for maximum velocity and scale.',
                'tags' => ['Laravel & Modern PHP', 'MERN Stack (React / Node)', 'Django & Python Systems', 'Tailwind & Framer Motion UI'],
            ],
            [
                'id' => 'ai',
                'num' => '04',
                'icon' => 'BrainCircuit',
                'title' => 'AI Integration & ML',
                'badge' => 'INTELLIGENT SYSTEMS',
                'description' => 'Supercharge enterprise operations with custom fine-tuned LLMs, autonomous AI agents, predictive analytics, vector search, and intelligent workflow automation.',
                'tags' => ['Custom LLMs & AI Agents', 'Predictive Business Analytics', 'Intelligent Workflow Automation', 'Vector Search & RAG Pipelines'],
            ],
            [
                'id' => 'cloud',
                'num' => '05',
                'icon' => 'Cloud',
                'title' => 'Cloud Architecture & DevOps',
                'badge' => 'INFRASTRUCTURE',
                'description' => 'End-to-end cloud infrastructure engineering on AWS and Azure with zero-downtime migrations, Kubernetes orchestration, and FinOps cost optimization.',
                'tags' => ['AWS & Azure Cloud Design', 'Kubernetes & Docker Clusters', 'FinOps Cost Optimization', '99.99% High Availability SLA'],
            ],
        ];

        $testimonials = [
            [
                'quote' => 'Vertrix Technologies transformed our legacy system into a high-performance SaaS platform. Their attention to detail in architecture, multi-tenant security, and microservices is unmatched in the industry.',
                'name' => 'Marcus Vance',
                'role' => 'CTO',
                'company' => 'Vertex Dynamics',
                'avatar' => 'MV',
            ],
            [
                'quote' => 'The VAPT testing provided by Vertrix was thorough and deeply professional. They identified critical vulnerabilities that saved us from potential breaches and guided us effortlessly through SOC 2 certification.',
                'name' => 'Priya Sharma',
                'role' => 'Head of Security & Engineering',
                'company' => 'DataPulse Analytics',
                'avatar' => 'PS',
            ],
            [
                'quote' => 'Integrating AI into our existing operational workflow seemed daunting until we partnered with Vertrix Technologies. They built custom agents that automated 70% of our manual workload with stunning accuracy.',
                'name' => 'David Chen',
                'role' => 'Founder & CEO',
                'company' => 'OmniRetail AI',
                'avatar' => 'DC',
            ],
        ];

        $faqs = [
            [
                'question' => 'How do you ensure project security?',
                'answer' => 'Security is baked into our development lifecycle from day one. We conduct regular VAPT (Vulnerability Assessment and Penetration Testing) and follow OWASP Top 10 guidelines for every SaaS, web application, and cloud infrastructure we build.',
            ],
            [
                'question' => 'What technology stacks and languages do you specialize in?',
                'answer' => 'We specialize in battle-tested enterprise technologies: PHP & Laravel, MERN stack (MongoDB, Express, React, Node.js), Python & Django, PostgreSQL, Docker, Kubernetes, AWS, and modern AI/LLM integration frameworks.',
            ],
            [
                'question' => 'Do you provide post-launch support and maintenance?',
                'answer' => 'Yes. We provide 24/7 technical assistance, continuous uptime monitoring, regular security patches, bug fixes, and automated backups under SLA guarantees to ensure your systems run flawlessly.',
            ],
            [
                'question' => 'Can you help migrate legacy software into modern SaaS or Cloud?',
                'answer' => 'Absolutely. We specialize in zero-downtime migrations, transforming monolithic legacy applications into modern microservices and high-availability cloud platforms on AWS, Azure, or hybrid infrastructure.',
            ],
            [
                'question' => 'What does your development lifecycle look like?',
                'answer' => 'Our process is structured in 4 transparent stages: 01 Discovery & Requirement Strategy, 02 System Design & Architecture, 03 Agile Full-Stack Development & QA Testing, and 04 Production Deployment with 24/7 ongoing optimization.',
            ],
        ];

        return view('home', compact('services', 'testimonials', 'faqs'));
    }
}
