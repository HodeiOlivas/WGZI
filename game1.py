import pygame
import random
import time

# Inicializa Pygame
pygame.init()

# Configuración de la pantalla
WIDTH, HEIGHT = 800, 600
screen = pygame.display.set_mode((WIDTH, HEIGHT))
pygame.display.set_caption("Esquiva los cuadrados enemigos")

# Colores
WHITE = (255, 255, 255)
RED = (255, 0, 0)
YELLOW = (255, 255, 0)

# Jugador
player_width = 50
player_height = 50
player_x = (WIDTH - player_width) // 2
player_y = HEIGHT - player_height
player_speed = 5

# Obstáculos
obstacle_width = 50
obstacle_height = 50
obstacle_speed = 5
obstacles = []

# Puntuación y velocidad
score = 0
player_speed_bonus = 0
font = pygame.font.Font(None, 36)

def display_score():
    text = font.render(f"Puntuación: {score}", True, WHITE)
    screen.blit(text, (10, 10))
    amarillo_text = font.render("Amarillos Puntos", True, YELLOW)
    screen.blit(amarillo_text, (WIDTH // 2 - 100, 10))
    rojo_text = font.render("Rojos Velocidad", True, RED)
    screen.blit(rojo_text, (WIDTH // 2 - 100, 40))

def game_over():
    text = font.render("¡Perdiste! Presiona ESC para salir.", True, WHITE)
    screen.blit(text, (WIDTH // 2 - 200, HEIGHT // 2 - 18))
    pygame.display.update()
    while True:
        for event in pygame.event.get():
            if event.type == pygame.QUIT:
                pygame.quit()
                exit()
            if event.type == pygame.KEYDOWN and event.key == pygame.K_ESCAPE:
                pygame.quit()
                exit()

# Función para dibujar los objetos
def draw_objects():
    for obstacle in obstacles:
        pygame.draw.rect(screen, obstacle['color'], (obstacle['x'], obstacle['y'], obstacle['width'], obstacle['height']))

# Bucle principal del juego
running = True
clock = pygame.time.Clock()
start_time = time.time()

while running:
    for event in pygame.event.get():
        if event.type == pygame.QUIT:
            running = False

    keys = pygame.key.get_pressed()su
    if keys[pygame.K_LEFT]:
        player_x -= player_speed + player_speed_bonus
    if keys[pygame.K_RIGHT]:
        player_x += player_speed + player_speed_bonus

    # Genera nuevos obstáculos
    if random.randint(1, 60) == 1:
        color = random.choice([YELLOW, RED, (random.randint(0, 255), random.randint(0, 255), random.randint(0, 255))])
        obstacles.append({
            'x': random.randint(0, WIDTH - obstacle_width),
            'y': 0,
            'width': obstacle_width,
            'height': obstacle_height,
            'color': color
        })

    # Actualiza la posición de los obstáculos y verifica colisiones
    for obstacle in obstacles:
        obstacle['y'] += obstacle_speed
        if (
            player_x < obstacle['x'] + obstacle['width']
            and player_x + player_width > obstacle['x']
            and player_y < obstacle['y'] + obstacle['height']
            and player_y + player_height > obstacle['y']
        ):
            if obstacle['color'] == YELLOW:
                score += 3
            elif obstacle['color'] == RED:
                player_speed_bonus += 2
            else:
                game_over()
            obstacles.remove(obstacle)
        if obstacle['y'] > HEIGHT:
            obstacles.remove(obstacle)

    # Aumenta la velocidad de caída de los obstáculos con el tiempo
    elapsed_time = time.time() - start_time
    if elapsed_time > 10:
        obstacle_speed += 1
        start_time = time.time()

    # Limpia la pantalla
    screen.fill((0, 0, 0))

    # Dibuja al jugador y obstáculos
    pygame.draw.rect(screen, WHITE, (player_x, player_y, player_width, player_height))
    draw_objects()

    # Muestra la puntuación y las etiquetas
    display_score()

    # Muestra la velocidad actual del jugador
    speed_text = font.render(f"Velocidad: {player_speed + player_speed_bonus}", True, WHITE)
    screen.blit(speed_text, (WIDTH - 200, 10))

    pygame.display.update()
    clock.tick(60)

# Cierra Pygame
pygame.quit()
