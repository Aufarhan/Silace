<button {{ $attributes->merge(['type' => 'button', 'class' => 'inline-flex items-center px-[26px] py-[12px] rounded-[16px] font-semibold text-[16px] font-lexend transition ease-in-out duration-150 text-primary ring ring-primary dark:text-white dark:ring-white hover:bg-primary/80 hover:text-white hover:ring-primary/80 dark:hover:bg-primary/80 dark:hover:text-white dark:hover:ring-primary/80']) }}>
    {{ $slot }}
</button>
