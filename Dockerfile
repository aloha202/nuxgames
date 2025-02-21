# Use official PHP image with necessary extensions
FROM php:8.4-cli

# Install dependencies
RUN apt-get update && apt-get install -y \
    unzip \
    git \
    curl \
    libsqlite3-dev \
    && docker-php-ext-install pdo pdo_sqlite

# Install Composer
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer


# Install Node.js and npm (LTS version)
RUN curl -fsSL https://deb.nodesource.com/setup_18.x | bash - && \
    apt-get install -y nodejs

# Verify installation
RUN node -v && npm -v

# Set working directory
WORKDIR /app

# Copy project files
COPY . .

# Make sure the database file exists
RUN mkdir -p database && touch database/database.sqlite
RUN cp .env.example .env

# Expose port
EXPOSE 8000

CMD ["bash", "/app/run.sh"]
