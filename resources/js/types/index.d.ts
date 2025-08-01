import type { LucideIcon } from 'lucide-vue-next';
import type { Config } from 'ziggy-js';

export interface Auth {
    user: User;
}

export interface BreadcrumbItem {
    title: string;
    href: string;
}

export interface NavItem {
    title: string;
    href: string;
    icon?: LucideIcon;
    isActive?: boolean;
}

export type AppPageProps<T extends Record<string, unknown> = Record<string, unknown>> = T & {
    name: string;
    quote: { message: string; author: string };
    auth: Auth;
    ziggy: Config & { location: string };
    sidebarOpen: boolean;
};

export interface User {
    id: number;
    name: string;
    email: string;
    avatar?: string;
    email_verified_at: string | null;
    created_at: string;
    updated_at: string;
}

export interface Characteristic {
    id: number;
    name: string;
    email: string;
    meta_data: object;
    category_id: number;
    category_name: string;
    created_at: string;
    updated_at: string;
}

export interface CharacteristicCategory {
    id: number;
    name: string;
    email: string;
    meta_data: object;
    characteristic_category_id: number;
    created_at: string;
}

export interface Pagination {
    current_page: number;
    from: number;
    last_page: number;
    links: Array<{
        label: string;
        url: string | null;
        active: boolean;
    }>;
}

export type BreadcrumbItemType = BreadcrumbItem;
