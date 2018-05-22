import { async, ComponentFixture, TestBed } from '@angular/core/testing';

import { FiananceComponent } from './fianance.component';

describe('FiananceComponent', () => {
  let component: FiananceComponent;
  let fixture: ComponentFixture<FiananceComponent>;

  beforeEach(async(() => {
    TestBed.configureTestingModule({
      declarations: [ FiananceComponent ]
    })
    .compileComponents();
  }));

  beforeEach(() => {
    fixture = TestBed.createComponent(FiananceComponent);
    component = fixture.componentInstance;
    fixture.detectChanges();
  });

  it('should create', () => {
    expect(component).toBeTruthy();
  });
});
